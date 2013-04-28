Option Strict On

Public Class UserDetails
    Public Language As New Language()

    Private Sub btnSend_Click(sender As Object, e As EventArgs) Handles btnSend.Click
        ' Beschreibung wird an die Datenbank gesendet
        Me.DialogResult = Windows.Forms.DialogResult.OK
    End Sub

    Private Sub btnSkip_Click(sender As Object, e As EventArgs) Handles btnSkip.Click
        ' Beschreibung wird übersprungen
        Me.DialogResult = Windows.Forms.DialogResult.Ignore
    End Sub

    Private Sub UserDetails_Shown(sender As Object, e As EventArgs) Handles Me.Shown
        ' Text in Steuerelemente übernehmen
        ' Titel und Beschreibung im Fenster
        Me.Text = Language.winTitle
        lblDescription.Text = Language.winDescription

        ' Beschriftung der Tabs
        tabUserDescription.Text = Language.tabInputCaption
        tabDetailedInformation.Text = Language.tabDetailedInfoCaption

        ' Beschriftung der einzelnen Felder in dem "Weitere Informationen"-Tab
        gbAppVersion.Text = Language.appVersionCaption
        gbNetFramework.Text = Language.netVersionCaption
        gbOperatingSystem.Text = Language.osVersionCaption
        gbErrorDetails.Text = Language.errorDetailCaption

        ' Beschriftung der Buttons zum Senden oder Überspringen
        btnSend.Text = Language.bSend
        btnSkip.Text = Language.bSkip
    End Sub
End Class