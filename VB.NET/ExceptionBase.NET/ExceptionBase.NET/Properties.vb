Option Strict On

Public Class Language
    ''' <summary>
    ''' Der Titel des Benutzerfensters
    ''' </summary>
    Property winTitle As String = "Benutzerdetails zu dem Fehler"

    ''' <summary>
    ''' Die Beschreibung im Benutzerfenster, neben 
    ''' </summary>
    Property winDescription As String = "Es ist ein schwerwiegender Fehler aufgetreten. Bitte beschreiben Sie die Schritte, die zu dem Fehler geführt haben könnten, damit wir ihn so schnell wie möglich beheben können."

    ''' <summary>
    ''' Der Titel des Tabs, in den der Benutzer die Beschreibung eintragen kann.
    ''' </summary>
    Property tabInputCaption As String = "Beschreibung des Fehlers"

    ''' <summary>
    ''' Der Titel des Tabs, das erweiterte Informationen zu dem Fehler enthält
    ''' </summary>
    Property tabDetailedInfoCaption As String = "Weitere Informationen"

    ''' <summary>
    ''' Die Beschriftung des Programmversion-Feldes
    ''' </summary>
    Property appVersionCaption As String = "Programmversion"

    ''' <summary>
    ''' Die Beschriftung des Framework-Feldes
    ''' </summary>
    Property netVersionCaption As String = ".NET Framework"

    ''' <summary>
    ''' Die Beschriftung des Betriebssystem-Feldes
    ''' </summary>
    Property osVersionCaption As String = "Betriebssystem"

    ''' <summary>
    ''' Die Beschriftung des Detailfeldes
    ''' </summary>
    Property errorDetailCaption As String = "Fehler-Details"

    ''' <summary>
    ''' Die Beschriftung des Überspringen-Buttons
    ''' </summary>
    Property bSkip As String = "Ü&berspringen"

    ''' <summary>
    ''' Die Beschriftung des OK-Buttons
    ''' </summary>
    Property bSend As String = "&OK"
End Class

Public Class Server
    ''' <summary>
    ''' Die Adresse zur ExceptionBase.NET-API
    ''' </summary>
    ''' <remarks>z.B. http://meine.domain/api/addException.php, siehe Startseite im Webinterface</remarks>
    Property Server As String = ""

    ''' <summary>
    ''' Die IP-Adresse, die zur Überprüfung der Internetverbindung gepingt werden soll.
    ''' </summary>
    Property PingIP As String = "8.8.8.8"
End Class

Public Class Application
    ''' <summary>
    ''' Die Version Ihres Programmes
    ''' </summary>
    Property Version As String = ""

    ''' <summary>
    ''' Die ID Ihres Programmes in der Datenbank
    ''' </summary>
    Property ID As Integer = 0

    ''' <summary>
    ''' Das Icon Ihres Programmes, wird im Benutzerfenster in der linken Ecke angezeigt.
    ''' </summary>
    Property Icon As Drawing.Image

    ''' <summary>
    ''' Soll im Benutzerfenster ein Tab mit weiteren Informationen zu dem Fehler angezeigt werden?
    ''' </summary>
    Property ShowErrorDetails As Boolean = True
End Class

Public Class ExceptionInfo
    Property Message As String = ""
    Property Inner As String = ""
    Property StackTrace As String = ""
    Property TargetSite As String = ""
    Property UserDescription As String = ""
End Class