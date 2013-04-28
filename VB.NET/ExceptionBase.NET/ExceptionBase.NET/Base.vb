Option Strict On

Public Class ExceptionBase
#Region "Variablen"
    ' Form initialisieren
    Private UserDetails As New UserDetails()

    ' Klassenvariablen für Fehlerdetails setzen
    Dim NETFramework As String = ""
    Dim InstalledOS As String = ""

    ' Konstanten für 
    Private Const NOTAVAILABLE = "Nicht verfügbar"
    Private Const DESCSKIPPED = "Beschreibung übersprungen"
#End Region

#Region "Eigenschaften"

    ''' <summary>
    ''' Die Beschriftungen im Benutzerfenster
    ''' </summary>
    Property Language As New Language()

    ''' <summary>
    ''' Informationen zum Server
    ''' </summary>
    Property Server As New Server()

    ''' <summary>
    ''' Informationen zu Ihrem Programm
    ''' </summary>
    Property Application As New Application()

    ''' <summary>
    ''' Fehlerinformationen
    ''' </summary>
    Property Exception As New ExceptionInfo()
#End Region

#Region "Methoden"
    ''' <summary>
    ''' Erstellt einen neuen Exception-Tracker, der Fehler an die ExceptionBase-Datenbank schicken kann.
    ''' </summary>
    ''' <param name="Server">Die URL zum hinzufügen eines Fehlers zur Datenbank. Siehe Startseite im PHP-Interface</param>
    ''' <param name="AppID">Die ID Ihrer App in der ExceptionBase.NET Datenbank</param>
    ''' <param name="Version">Die Version des Programmes</param>
    ''' <param name="AppIcon">Das Icon der App, wird im Detailfenster angezeigt</param>
    Public Sub New(ByVal Server As String, ByVal AppID As Integer, ByVal Version As String, ByVal AppIcon As Drawing.Image)
        Me.Application.Version = Version
        Me.Application.ID = AppID
        Me.Server.Server = Server
        Me.Application.Icon = AppIcon
    End Sub

    ''' <summary>
    ''' Sendet den gegebenen Fehler an die ExceptionBase.NET Datenbank und fragt, wenn nicht anders
    ''' angegeben, den Nutzer vorher nach Informationen zu dem Fehler.
    ''' </summary>
    ''' <param name="ex">Die Exception, die zur Datenbank gesendet werden soll.</param>
    ''' <param name="AskUser">Soll der Benutzer selbst Informationen zu dem Fehler angeben können?</param>
    ''' <param name="ThrowException">Soll eine Exception geworfen werden, wenn in der Methode ein Fehler auftritt?</param>
    Public Sub Track(ByVal ex As Exception, Optional ByVal AskUser As Boolean = True, Optional ByVal ThrowException As Boolean = False)
        Try
            ' Informationen aus dem Fehler auslesen
            GatherInformation(ex)

            ' Fehler Tracken
            TrackCustom(AskUser)
        Catch exception As Exception
            If ThrowException Then Throw exception
        End Try
    End Sub

    ''' <summary>
    ''' Bezieht alle nötigen Informationen aus der Exception
    ''' </summary>
    ''' <param name="ex">Die Exception aus der Fehlerinformationen bezogen werden sollen</param>
    ''' <remarks></remarks>
    Public Sub GatherInformation(Optional ByVal ex As Exception = Nothing)
        ' .NET Framework und installiertes Betriebssystem auslesen
        NETFramework = System.Environment.Version.ToString()
        InstalledOS = System.Environment.OSVersion.VersionString

        If Not IsNothing(ex) Then
            ' Message der Exception auslesen
            If Not IsNothing(ex.Message) Then
                Exception.Message = ex.Message
            Else
                Exception.Message = NOTAVAILABLE
            End If

            ' InnerException auslesen
            If Not IsNothing(ex.InnerException) Then
                Exception.Inner = ex.InnerException.ToString
            Else
                Exception.Inner = NOTAVAILABLE
            End If

            ' StackTrace der Exception auslesen
            If Not IsNothing(ex.StackTrace) Then
                Exception.StackTrace = ex.StackTrace
            Else
                Exception.StackTrace = NOTAVAILABLE
            End If

            ' Methode, die Exception ausgelöst hat, auslesen
            If Not IsNothing(ex.TargetSite) Then
                Exception.TargetSite = ex.TargetSite.ToString()
            Else
                Exception.TargetSite = NOTAVAILABLE
            End If
        End If
    End Sub

    ''' <summary>
    ''' Schickt den Fehler an den vorher angegebenen Server.
    ''' </summary>
    ''' <remarks></remarks>
    Public Sub Send()
        ' Parameter für Server-Anfrage zusammensetzen
        Dim args As String = "em=" & Exception.Message & _
                             "&ei=" & Exception.Inner & _
                             "&st=" & Exception.StackTrace & _
                             "&eme=" & Exception.TargetSite & _
                             "&udesc=" & Exception.UserDescription & _
                             "&appid=" & Application.ID & _
                             "&v=" & Application.Version & _
                             "&net=" & NETFramework & _
                             "&os=" & InstalledOS

        ' Prüfen, ob Computer eine Internetverbindung hat
        If My.Computer.Network.Ping(Server.PingIP) Then
            If Functions.PostURL(Server.Server, args).Split(";"c)(0) = "1" Then
                Debug.Print("[ExceptionBase Info] Sent error report to the database.")
            Else
                Debug.Print("[ExceptionBase Info] Error while sending error to the database.")
            End If
        End If
    End Sub

    ''' <summary>
    ''' Tracken eines selbst erstellten Fehlers, Informationen können in ExceptionInformation angepasst werden.
    ''' </summary>
    ''' <param name="AskUser">Soll der Benutzer nach Informationen gefragt werden?</param>
    Public Sub TrackCustom(Optional ByVal AskUser As Boolean = True)
        If AskUser Then
            ' Sprache, Icon und Fehlerdetails in das Benutzerfenster übernehmen
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
                .tbNetFramework.Text = NETFramework
                .tbOperatingSystem.Text = InstalledOS
                .tbErrorDescription.Text = Exception.Message
                .tbErrorInner.Text = Exception.Inner
            End With

            ' Benutzerfenster als Dialog anzeigen
            If UserDetails.ShowDialog() = Windows.Forms.DialogResult.OK Then
                Exception.UserDescription = UserDetails.tbUserDescription.Text
            Else
                Exception.UserDescription = DESCSKIPPED
            End If
        Else
            Exception.UserDescription = NOTAVAILABLE
        End If

        ' Fehler an die Datenbank senden
        Send()
    End Sub
#End Region
End Class
