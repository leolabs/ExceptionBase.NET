Option Strict On

Public Class Language
    ''' <summary>
    ''' The UserDetails window's title
    ''' </summary>
    Property winTitle As String = "Provide details to the exception"

    ''' <summary>
    ''' The description, next to your app's icon 
    ''' </summary>
    Property winDescription As String = "A fatal error occured. Please describe the steps that could have lead to the error, so we can fix it as fast as possible."

    ''' <summary>
    ''' The title of the tab where the user can enter his description
    ''' </summary>
    Property tabInputCaption As String = "Error description"

    ''' <summary>
    ''' The title of the tab that contains advanced error information
    ''' </summary>
    Property tabDetailedInfoCaption As String = "Advanced information"

    ''' <summary>
    ''' The app version's title
    ''' </summary>
    Property appVersionCaption As String = "App version"

    ''' <summary>
    ''' The framework's title
    ''' </summary>
    Property netVersionCaption As String = ".NET Framework"

    ''' <summary>
    ''' The OS's title
    ''' </summary>
    Property osVersionCaption As String = "Operating system"

    ''' <summary>
    ''' The ExceptionMessage's title
    ''' </summary>
    Property errorDetailCaption As String = "Error message"

    ''' <summary>
    ''' Tit skip button's title
    ''' </summary>
    Property bSkip As String = "S&kip"

    ''' <summary>
    ''' The send button's title
    ''' </summary>
    Property bSend As String = "&Send"
End Class

''' <summary>
''' You custom data's data type
''' </summary>
''' <remarks></remarks>
Public Enum DataType
    Text = 1
    XML = 2
    JSON = 3
    Image = 4
    Binary = 5
End Enum

Public Class Server
    ''' <summary>
    ''' Your Exceptionbase.NET API URL
    ''' </summary>
    ''' <remarks>e.g. http://my.domain/api/addException, see "System Settings" in your web interface</remarks>
    Property Server As String = ""

    ''' <summary>
    ''' The IP Address that's used to check for an internet connection
    ''' </summary>
    Property PingIP As String = "8.8.8.8"
End Class

Public Class Application
    ''' <summary>
    ''' Your app's version
    ''' </summary>
    Property Version As String = ""

    ''' <summary>
    ''' Your app's ID
    ''' </summary>
    Property ID As Integer = 0

    ''' <summary>
    ''' Your app's icon, will be shown on the UserDetails Form.
    ''' </summary>
    Property Icon As Drawing.Image

    ''' <summary>
    ''' Shall error details be shown to the user?
    ''' </summary>
    Property ShowErrorDetails As Boolean = True
End Class

Public Class ExceptionInfo
    Property Message As String = ""
    Property Inner As String = ""
    Property StackTrace As String = ""
    Property TargetSite As String = ""
    Property UserDescription As String = ""
    Property CustomData As Byte() = System.Text.Encoding.Default.GetBytes("")
    Property CustomDataType As DataType = DataType.Text
End Class

Public Class SystemInfo
    Property NETFramework As String = System.Environment.Version.ToString()
    Property InstalledOS As String = System.Environment.OSVersion.VersionString
    Property ProcessorCount As Integer = Environment.ProcessorCount
    Property Architecture As String = Environment.GetEnvironmentVariable("PROCESSOR_ARCHITECTURE")
    Property TotalMemory As ULong = My.Computer.Info.TotalPhysicalMemory
    Property FreeMemory As ULong = My.Computer.Info.AvailablePhysicalMemory
End Class