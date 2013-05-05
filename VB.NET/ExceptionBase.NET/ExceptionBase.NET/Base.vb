Option Strict On

Imports System.Collections.Specialized

Public Class ExceptionBase
#Region "Variables"
    ' Initialize form
    Private UserDetails As New UserDetails()

    ' Some constants 
    Private Const NOTAVAILABLE = "N/A"
    Private Const DESCSKIPPED = "Skipped"
#End Region

#Region "Properties"

    ''' <summary>
    ''' Localizable strings for the UserDetails form
    ''' </summary>
    Property Language As New Language()

    ''' <summary>
    ''' Server information
    ''' </summary>
    Property Server As New Server()

    ''' <summary>
    ''' Information of your app
    ''' </summary>
    Property Application As New Application()

    ''' <summary>
    ''' System information like the processor count, architecture, etc
    ''' </summary>
    Property SystemInfo As New SystemInfo()

    ''' <summary>
    ''' Exception details
    ''' </summary>
    Property Exception As New ExceptionInfo()
#End Region

#Region "Methods"
    ''' <summary>
    ''' Creates a new ExceptionTracker that is able to gather and send information to an ExceptionBase.NET Server
    ''' </summary>
    ''' <param name="Server">The API's URL. Please check your System Settings page on the web interface for more information.</param>
    ''' <param name="AppID">Your application's ID. Can be found under "Manage Applications" on the web interface</param>
    ''' <param name="Version">Your application's version</param>
    ''' <param name="AppIcon">Your application's icon, will be shown on the UserDetails form</param>
    Public Sub New(ByVal Server As String, ByVal AppID As Integer, ByVal Version As String, ByVal Optional AppIcon As Drawing.Image = Nothing)
        Me.Application.Version = Version
        Me.Application.ID = AppID
        Me.Server.Server = Server
        Me.Application.Icon = AppIcon
    End Sub

    ''' <summary>
    ''' Sends the given error to your ExceptionBase.NET database and, if AskUser is True, asks the user to describe the error
    ''' </summary>
    ''' <param name="ex">The Exception that will be sent to your ExceptionBase.NET database</param>
    ''' <param name="AskUser">Shall the user be able to give his own information concerning this error?</param>
    ''' <param name="ThrowException">Shall an Exception be thrown if something happens in this method?</param>
    Public Sub Track(ByVal ex As Exception, Optional ByVal AskUser As Boolean = True, Optional ByVal ThrowException As Boolean = False)
        Try
            ' Gather the needed information from the given Exception
            GatherInformation(ex)

            ' Track the Exception
            TrackCustom(AskUser)
        Catch exception As Exception
            If ThrowException Then Throw exception
        End Try
    End Sub

    ''' <summary>
    ''' Gathers all the relevant information from a given error
    ''' </summary>
    ''' <param name="ex">The error that information should be gathered from</param>
    ''' <remarks></remarks>
    Public Sub GatherInformation(Optional ByVal ex As Exception = Nothing)

        If Not IsNothing(ex) Then
            ' Get the Exception Message
            Exception.Message = If(Not IsNothing(ex.Message), ex.Message, NOTAVAILABLE)

            ' Get the InnerException's message
            Exception.Message = If(Not IsNothing(ex.InnerException), ex.InnerException.ToString, NOTAVAILABLE)

            ' Get the stack trace
            Exception.Message = If(Not IsNothing(ex.StackTrace), ex.StackTrace, NOTAVAILABLE)

            ' Get the TargetSite
            Exception.Message = If(Not IsNothing(ex.TargetSite), ex.TargetSite.ToString, NOTAVAILABLE)
        End If
    End Sub

    ''' <summary>
    ''' Sends the error to your ExceptionBase.NET database.
    ''' </summary>
    Public Sub Send()
        ' Combine the parameters for POST request

        Dim NVC As New NameValueCollection()

        NVC.Add("em", Exception.Message)
        NVC.Add("ei", Exception.Inner)
        NVC.Add("st", Exception.StackTrace)
        NVC.Add("eme", Exception.TargetSite)
        NVC.Add("udesc", Exception.UserDescription)
        NVC.Add("appid", Application.ID.ToString)
        NVC.Add("v", Application.Version)
        NVC.Add("net", SystemInfo.NETFramework)
        NVC.Add("os", SystemInfo.InstalledOS)
        NVC.Add("arch", SystemInfo.Architecture)
        NVC.Add("cores", SystemInfo.ProcessorCount.ToString)
        NVC.Add("memfree", SystemInfo.FreeMemory.ToString)
        NVC.Add("memtotal", SystemInfo.TotalMemory.ToString)
        NVC.Add("misc", System.Convert.ToBase64String(Exception.CustomData))
        NVC.Add("misctype", Exception.CustomDataType.ToString)

        ' Check if the computer has an internet connection
        If My.Computer.Network.Ping(Server.PingIP) Then
            If Functions.PostURL(Server.Server, NVC).Split(";"c)(0) = "1" Then
                Debug.Print("[ExceptionBase Info] Sent error report to the database.")
            Else
                Debug.Print("[ExceptionBase Info] Error while sending error to the database.")
            End If
        End If
    End Sub

    ''' <summary>
    ''' Track your custom exception. You can define the values before using this method.
    ''' </summary>
    ''' <param name="AskUser">Shell the user be asked to provide details about the exception?</param>
    Public Sub TrackCustom(Optional ByVal AskUser As Boolean = True)
        If AskUser Then
            ' Apply language, icon and other data to the window
            With UserDetails
                .Language = Me.Language

                If Application.ShowErrorDetails Then
                    .tabDetailedInformation.Show()
                Else
                    .tabDetailedInformation.Hide()
                End If

                .tcInformation.SelectTab(0)
                .pbAppImage.Image = Application.Icon
                .tbAppVersion.Text = Application.Version
                .tbNetFramework.Text = SystemInfo.NETFramework
                .tbOperatingSystem.Text = SystemInfo.InstalledOS
                .tbErrorDescription.Text = Exception.Message
                .tbErrorInner.Text = Exception.Inner
            End With

            ' Show UserDetails Form as a dialog
            If UserDetails.ShowDialog() = Windows.Forms.DialogResult.OK Then
                Exception.UserDescription = UserDetails.tbUserDescription.Text
            Else
                Exception.UserDescription = DESCSKIPPED
            End If
        Else
            Exception.UserDescription = NOTAVAILABLE
        End If

        ' Send the error to your ExceptionBase.NET database
        Send()
    End Sub
#End Region
End Class
