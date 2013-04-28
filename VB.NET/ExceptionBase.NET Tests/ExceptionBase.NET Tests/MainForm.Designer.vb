<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class MainForm
    Inherits System.Windows.Forms.Form

    'Das Formular überschreibt den Löschvorgang, um die Komponentenliste zu bereinigen.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Wird vom Windows Form-Designer benötigt.
    Private components As System.ComponentModel.IContainer

    'Hinweis: Die folgende Prozedur ist für den Windows Form-Designer erforderlich.
    'Das Bearbeiten ist mit dem Windows Form-Designer möglich.  
    'Das Bearbeiten mit dem Code-Editor ist nicht möglich.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Me.lblProjectDescription = New System.Windows.Forms.Label()
        Me.pnlBlueLine = New System.Windows.Forms.Panel()
        Me.btnDoubleToStringError = New System.Windows.Forms.Button()
        Me.btnNonexistentFileError = New System.Windows.Forms.Button()
        Me.gbServerAddress = New System.Windows.Forms.GroupBox()
        Me.tbDatabaseAdress = New System.Windows.Forms.TextBox()
        Me.gbAppID = New System.Windows.Forms.GroupBox()
        Me.nudAppID = New System.Windows.Forms.NumericUpDown()
        Me.Button1 = New System.Windows.Forms.Button()
        Me.gbServerAddress.SuspendLayout()
        Me.gbAppID.SuspendLayout()
        CType(Me.nudAppID, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'lblProjectDescription
        '
        Me.lblProjectDescription.AutoEllipsis = True
        Me.lblProjectDescription.BackColor = System.Drawing.Color.White
        Me.lblProjectDescription.Cursor = System.Windows.Forms.Cursors.Hand
        Me.lblProjectDescription.Dock = System.Windows.Forms.DockStyle.Top
        Me.lblProjectDescription.Location = New System.Drawing.Point(0, 0)
        Me.lblProjectDescription.MinimumSize = New System.Drawing.Size(272, 58)
        Me.lblProjectDescription.Name = "lblProjectDescription"
        Me.lblProjectDescription.Padding = New System.Windows.Forms.Padding(10)
        Me.lblProjectDescription.Size = New System.Drawing.Size(433, 59)
        Me.lblProjectDescription.TabIndex = 3
        Me.lblProjectDescription.Text = "Dieses Programm testet die Fehlerbehandlung und das damit verbundene Fehlerfenste" & _
    "r von ExceptionBase.NET. " & Global.Microsoft.VisualBasic.ChrW(13) & Global.Microsoft.VisualBasic.ChrW(10) & "Testseite: http://test.exceptionbase.net | Mehr Infos" & _
    ": http://git.exceptionbase.net"
        '
        'pnlBlueLine
        '
        Me.pnlBlueLine.BackColor = System.Drawing.SystemColors.Highlight
        Me.pnlBlueLine.Dock = System.Windows.Forms.DockStyle.Top
        Me.pnlBlueLine.Location = New System.Drawing.Point(0, 59)
        Me.pnlBlueLine.Name = "pnlBlueLine"
        Me.pnlBlueLine.Size = New System.Drawing.Size(433, 10)
        Me.pnlBlueLine.TabIndex = 4
        '
        'btnDoubleToStringError
        '
        Me.btnDoubleToStringError.Location = New System.Drawing.Point(12, 126)
        Me.btnDoubleToStringError.Name = "btnDoubleToStringError"
        Me.btnDoubleToStringError.Size = New System.Drawing.Size(409, 35)
        Me.btnDoubleToStringError.TabIndex = 5
        Me.btnDoubleToStringError.Text = "Fehler auslösen (String zu Double konvertieren)"
        Me.btnDoubleToStringError.UseVisualStyleBackColor = True
        '
        'btnNonexistentFileError
        '
        Me.btnNonexistentFileError.Location = New System.Drawing.Point(12, 167)
        Me.btnNonexistentFileError.Name = "btnNonexistentFileError"
        Me.btnNonexistentFileError.Size = New System.Drawing.Size(409, 33)
        Me.btnNonexistentFileError.TabIndex = 6
        Me.btnNonexistentFileError.Text = "Fehler auslösen (Nicht existierende Datei öffnen)"
        Me.btnNonexistentFileError.UseVisualStyleBackColor = True
        '
        'gbServerAddress
        '
        Me.gbServerAddress.Controls.Add(Me.tbDatabaseAdress)
        Me.gbServerAddress.Location = New System.Drawing.Point(12, 80)
        Me.gbServerAddress.Name = "gbServerAddress"
        Me.gbServerAddress.Size = New System.Drawing.Size(350, 40)
        Me.gbServerAddress.TabIndex = 7
        Me.gbServerAddress.TabStop = False
        Me.gbServerAddress.Text = "Adresse der Datenbank-API"
        '
        'tbDatabaseAdress
        '
        Me.tbDatabaseAdress.Dock = System.Windows.Forms.DockStyle.Fill
        Me.tbDatabaseAdress.Location = New System.Drawing.Point(3, 16)
        Me.tbDatabaseAdress.Name = "tbDatabaseAdress"
        Me.tbDatabaseAdress.Size = New System.Drawing.Size(344, 20)
        Me.tbDatabaseAdress.TabIndex = 0
        Me.tbDatabaseAdress.Text = "http://test.exceptionbase.net/api/addException.php"
        '
        'gbAppID
        '
        Me.gbAppID.Controls.Add(Me.nudAppID)
        Me.gbAppID.Location = New System.Drawing.Point(368, 80)
        Me.gbAppID.Name = "gbAppID"
        Me.gbAppID.Size = New System.Drawing.Size(53, 40)
        Me.gbAppID.TabIndex = 8
        Me.gbAppID.TabStop = False
        Me.gbAppID.Text = "AppID"
        '
        'nudAppID
        '
        Me.nudAppID.Dock = System.Windows.Forms.DockStyle.Fill
        Me.nudAppID.Location = New System.Drawing.Point(3, 16)
        Me.nudAppID.Maximum = New Decimal(New Integer() {999, 0, 0, 0})
        Me.nudAppID.Name = "nudAppID"
        Me.nudAppID.Size = New System.Drawing.Size(47, 20)
        Me.nudAppID.TabIndex = 0
        '
        'Button1
        '
        Me.Button1.Location = New System.Drawing.Point(12, 206)
        Me.Button1.Name = "Button1"
        Me.Button1.Size = New System.Drawing.Size(409, 33)
        Me.Button1.TabIndex = 9
        Me.Button1.Text = "Eigenen Fehler erstellen und an die Datenbank schicken"
        Me.Button1.UseVisualStyleBackColor = True
        '
        'MainForm
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(433, 250)
        Me.Controls.Add(Me.Button1)
        Me.Controls.Add(Me.gbAppID)
        Me.Controls.Add(Me.gbServerAddress)
        Me.Controls.Add(Me.btnNonexistentFileError)
        Me.Controls.Add(Me.btnDoubleToStringError)
        Me.Controls.Add(Me.pnlBlueLine)
        Me.Controls.Add(Me.lblProjectDescription)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedDialog
        Me.MaximizeBox = False
        Me.Name = "MainForm"
        Me.ShowIcon = False
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "ExceptionBase.NET Tests"
        Me.gbServerAddress.ResumeLayout(False)
        Me.gbServerAddress.PerformLayout()
        Me.gbAppID.ResumeLayout(False)
        CType(Me.nudAppID, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)

    End Sub
    Friend WithEvents lblProjectDescription As System.Windows.Forms.Label
    Friend WithEvents btnDoubleToStringError As System.Windows.Forms.Button
    Friend WithEvents btnNonexistentFileError As System.Windows.Forms.Button
    Friend WithEvents gbServerAddress As System.Windows.Forms.GroupBox
    Friend WithEvents tbDatabaseAdress As System.Windows.Forms.TextBox
    Friend WithEvents gbAppID As System.Windows.Forms.GroupBox
    Friend WithEvents nudAppID As System.Windows.Forms.NumericUpDown
    Private WithEvents pnlBlueLine As System.Windows.Forms.Panel
    Friend WithEvents Button1 As System.Windows.Forms.Button

End Class
