<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class UserDetails
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
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(UserDetails))
        Me.tlpImageAndDescription = New System.Windows.Forms.TableLayoutPanel()
        Me.pbAppImage = New System.Windows.Forms.PictureBox()
        Me.lblDescription = New System.Windows.Forms.Label()
        Me.pnlControlButtons = New System.Windows.Forms.Panel()
        Me.lblModuleName = New System.Windows.Forms.Label()
        Me.btnSkip = New System.Windows.Forms.Button()
        Me.pnlButtonMargin = New System.Windows.Forms.Panel()
        Me.btnSend = New System.Windows.Forms.Button()
        Me.pnlMarginBottom = New System.Windows.Forms.Panel()
        Me.tcInformation = New System.Windows.Forms.TabControl()
        Me.tabUserDescription = New System.Windows.Forms.TabPage()
        Me.tbUserDescription = New System.Windows.Forms.TextBox()
        Me.tabDetailedInformation = New System.Windows.Forms.TabPage()
        Me.gbErrorDetails = New System.Windows.Forms.GroupBox()
        Me.tlpErrorDetails = New System.Windows.Forms.TableLayoutPanel()
        Me.tbErrorInner = New System.Windows.Forms.TextBox()
        Me.tbErrorDescription = New System.Windows.Forms.TextBox()
        Me.Panel1 = New System.Windows.Forms.Panel()
        Me.tlpSystemInformation = New System.Windows.Forms.TableLayoutPanel()
        Me.gbOperatingSystem = New System.Windows.Forms.GroupBox()
        Me.tbOperatingSystem = New System.Windows.Forms.TextBox()
        Me.gbNetFramework = New System.Windows.Forms.GroupBox()
        Me.tbNetFramework = New System.Windows.Forms.TextBox()
        Me.gbAppVersion = New System.Windows.Forms.GroupBox()
        Me.tbAppVersion = New System.Windows.Forms.TextBox()
        Me.tlpImageAndDescription.SuspendLayout()
        CType(Me.pbAppImage, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.pnlControlButtons.SuspendLayout()
        Me.tcInformation.SuspendLayout()
        Me.tabUserDescription.SuspendLayout()
        Me.tabDetailedInformation.SuspendLayout()
        Me.gbErrorDetails.SuspendLayout()
        Me.tlpErrorDetails.SuspendLayout()
        Me.tlpSystemInformation.SuspendLayout()
        Me.gbOperatingSystem.SuspendLayout()
        Me.gbNetFramework.SuspendLayout()
        Me.gbAppVersion.SuspendLayout()
        Me.SuspendLayout()
        '
        'tlpImageAndDescription
        '
        Me.tlpImageAndDescription.ColumnCount = 2
        Me.tlpImageAndDescription.ColumnStyles.Add(New System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 64.0!))
        Me.tlpImageAndDescription.ColumnStyles.Add(New System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100.0!))
        Me.tlpImageAndDescription.Controls.Add(Me.pbAppImage, 0, 0)
        Me.tlpImageAndDescription.Controls.Add(Me.lblDescription, 1, 0)
        Me.tlpImageAndDescription.Dock = System.Windows.Forms.DockStyle.Top
        Me.tlpImageAndDescription.Location = New System.Drawing.Point(10, 10)
        Me.tlpImageAndDescription.Name = "tlpImageAndDescription"
        Me.tlpImageAndDescription.RowCount = 2
        Me.tlpImageAndDescription.RowStyles.Add(New System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 64.0!))
        Me.tlpImageAndDescription.RowStyles.Add(New System.Windows.Forms.RowStyle())
        Me.tlpImageAndDescription.Size = New System.Drawing.Size(510, 75)
        Me.tlpImageAndDescription.TabIndex = 4
        '
        'pbAppImage
        '
        Me.pbAppImage.Dock = System.Windows.Forms.DockStyle.Fill
        Me.pbAppImage.Location = New System.Drawing.Point(0, 0)
        Me.pbAppImage.Margin = New System.Windows.Forms.Padding(0)
        Me.pbAppImage.Name = "pbAppImage"
        Me.pbAppImage.Size = New System.Drawing.Size(64, 64)
        Me.pbAppImage.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom
        Me.pbAppImage.TabIndex = 0
        Me.pbAppImage.TabStop = False
        '
        'lblDescription
        '
        Me.lblDescription.AutoEllipsis = True
        Me.lblDescription.Dock = System.Windows.Forms.DockStyle.Fill
        Me.lblDescription.Location = New System.Drawing.Point(67, 0)
        Me.lblDescription.Name = "lblDescription"
        Me.lblDescription.Padding = New System.Windows.Forms.Padding(10)
        Me.lblDescription.Size = New System.Drawing.Size(440, 64)
        Me.lblDescription.TabIndex = 1
        Me.lblDescription.Text = resources.GetString("lblDescription.Text")
        Me.lblDescription.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'pnlControlButtons
        '
        Me.pnlControlButtons.Controls.Add(Me.lblModuleName)
        Me.pnlControlButtons.Controls.Add(Me.btnSkip)
        Me.pnlControlButtons.Controls.Add(Me.pnlButtonMargin)
        Me.pnlControlButtons.Controls.Add(Me.btnSend)
        Me.pnlControlButtons.Dock = System.Windows.Forms.DockStyle.Bottom
        Me.pnlControlButtons.Location = New System.Drawing.Point(10, 347)
        Me.pnlControlButtons.Name = "pnlControlButtons"
        Me.pnlControlButtons.Padding = New System.Windows.Forms.Padding(6)
        Me.pnlControlButtons.Size = New System.Drawing.Size(510, 35)
        Me.pnlControlButtons.TabIndex = 6
        '
        'lblModuleName
        '
        Me.lblModuleName.Dock = System.Windows.Forms.DockStyle.Left
        Me.lblModuleName.ForeColor = System.Drawing.SystemColors.ControlDark
        Me.lblModuleName.Location = New System.Drawing.Point(6, 6)
        Me.lblModuleName.Name = "lblModuleName"
        Me.lblModuleName.Size = New System.Drawing.Size(104, 23)
        Me.lblModuleName.TabIndex = 3
        Me.lblModuleName.Text = "ExceptionBase.NET"
        Me.lblModuleName.TextAlign = System.Drawing.ContentAlignment.MiddleLeft
        '
        'btnSkip
        '
        Me.btnSkip.Dock = System.Windows.Forms.DockStyle.Right
        Me.btnSkip.Location = New System.Drawing.Point(330, 6)
        Me.btnSkip.Name = "btnSkip"
        Me.btnSkip.Size = New System.Drawing.Size(84, 23)
        Me.btnSkip.TabIndex = 2
        Me.btnSkip.Text = "Ü&berspringen"
        Me.btnSkip.UseVisualStyleBackColor = True
        '
        'pnlButtonMargin
        '
        Me.pnlButtonMargin.Dock = System.Windows.Forms.DockStyle.Right
        Me.pnlButtonMargin.Location = New System.Drawing.Point(414, 6)
        Me.pnlButtonMargin.Name = "pnlButtonMargin"
        Me.pnlButtonMargin.Size = New System.Drawing.Size(6, 23)
        Me.pnlButtonMargin.TabIndex = 1
        '
        'btnSend
        '
        Me.btnSend.Dock = System.Windows.Forms.DockStyle.Right
        Me.btnSend.Location = New System.Drawing.Point(420, 6)
        Me.btnSend.Name = "btnSend"
        Me.btnSend.Size = New System.Drawing.Size(84, 23)
        Me.btnSend.TabIndex = 0
        Me.btnSend.Text = "&OK"
        Me.btnSend.UseVisualStyleBackColor = True
        '
        'pnlMarginBottom
        '
        Me.pnlMarginBottom.Dock = System.Windows.Forms.DockStyle.Bottom
        Me.pnlMarginBottom.Location = New System.Drawing.Point(10, 342)
        Me.pnlMarginBottom.Name = "pnlMarginBottom"
        Me.pnlMarginBottom.Size = New System.Drawing.Size(510, 5)
        Me.pnlMarginBottom.TabIndex = 7
        '
        'tcInformation
        '
        Me.tcInformation.Controls.Add(Me.tabUserDescription)
        Me.tcInformation.Controls.Add(Me.tabDetailedInformation)
        Me.tcInformation.Dock = System.Windows.Forms.DockStyle.Fill
        Me.tcInformation.Location = New System.Drawing.Point(10, 85)
        Me.tcInformation.Name = "tcInformation"
        Me.tcInformation.SelectedIndex = 0
        Me.tcInformation.Size = New System.Drawing.Size(510, 257)
        Me.tcInformation.TabIndex = 8
        '
        'tabUserDescription
        '
        Me.tabUserDescription.Controls.Add(Me.tbUserDescription)
        Me.tabUserDescription.Location = New System.Drawing.Point(4, 22)
        Me.tabUserDescription.Name = "tabUserDescription"
        Me.tabUserDescription.Padding = New System.Windows.Forms.Padding(3)
        Me.tabUserDescription.Size = New System.Drawing.Size(502, 231)
        Me.tabUserDescription.TabIndex = 0
        Me.tabUserDescription.Text = "Beschreibung des Fehlers"
        Me.tabUserDescription.UseVisualStyleBackColor = True
        '
        'tbUserDescription
        '
        Me.tbUserDescription.AcceptsReturn = True
        Me.tbUserDescription.AcceptsTab = True
        Me.tbUserDescription.Dock = System.Windows.Forms.DockStyle.Fill
        Me.tbUserDescription.Location = New System.Drawing.Point(3, 3)
        Me.tbUserDescription.Multiline = True
        Me.tbUserDescription.Name = "tbUserDescription"
        Me.tbUserDescription.ScrollBars = System.Windows.Forms.ScrollBars.Both
        Me.tbUserDescription.Size = New System.Drawing.Size(496, 225)
        Me.tbUserDescription.TabIndex = 9
        '
        'tabDetailedInformation
        '
        Me.tabDetailedInformation.Controls.Add(Me.gbErrorDetails)
        Me.tabDetailedInformation.Controls.Add(Me.Panel1)
        Me.tabDetailedInformation.Controls.Add(Me.tlpSystemInformation)
        Me.tabDetailedInformation.Location = New System.Drawing.Point(4, 22)
        Me.tabDetailedInformation.Name = "tabDetailedInformation"
        Me.tabDetailedInformation.Padding = New System.Windows.Forms.Padding(5)
        Me.tabDetailedInformation.Size = New System.Drawing.Size(502, 231)
        Me.tabDetailedInformation.TabIndex = 1
        Me.tabDetailedInformation.Text = "Weitere Informationen"
        Me.tabDetailedInformation.UseVisualStyleBackColor = True
        '
        'gbErrorDetails
        '
        Me.gbErrorDetails.Controls.Add(Me.tlpErrorDetails)
        Me.gbErrorDetails.Dock = System.Windows.Forms.DockStyle.Fill
        Me.gbErrorDetails.Location = New System.Drawing.Point(5, 61)
        Me.gbErrorDetails.Name = "gbErrorDetails"
        Me.gbErrorDetails.Size = New System.Drawing.Size(492, 165)
        Me.gbErrorDetails.TabIndex = 3
        Me.gbErrorDetails.TabStop = False
        Me.gbErrorDetails.Text = "Fehler-Details"
        '
        'tlpErrorDetails
        '
        Me.tlpErrorDetails.ColumnCount = 1
        Me.tlpErrorDetails.ColumnStyles.Add(New System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100.0!))
        Me.tlpErrorDetails.Controls.Add(Me.tbErrorInner, 0, 1)
        Me.tlpErrorDetails.Controls.Add(Me.tbErrorDescription, 0, 0)
        Me.tlpErrorDetails.Dock = System.Windows.Forms.DockStyle.Fill
        Me.tlpErrorDetails.Location = New System.Drawing.Point(3, 16)
        Me.tlpErrorDetails.Name = "tlpErrorDetails"
        Me.tlpErrorDetails.RowCount = 2
        Me.tlpErrorDetails.RowStyles.Add(New System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 25.0!))
        Me.tlpErrorDetails.RowStyles.Add(New System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100.0!))
        Me.tlpErrorDetails.Size = New System.Drawing.Size(486, 146)
        Me.tlpErrorDetails.TabIndex = 0
        '
        'tbErrorInner
        '
        Me.tbErrorInner.BackColor = System.Drawing.SystemColors.Window
        Me.tbErrorInner.Dock = System.Windows.Forms.DockStyle.Fill
        Me.tbErrorInner.Location = New System.Drawing.Point(3, 28)
        Me.tbErrorInner.Multiline = True
        Me.tbErrorInner.Name = "tbErrorInner"
        Me.tbErrorInner.ReadOnly = True
        Me.tbErrorInner.ScrollBars = System.Windows.Forms.ScrollBars.Both
        Me.tbErrorInner.Size = New System.Drawing.Size(480, 115)
        Me.tbErrorInner.TabIndex = 1
        '
        'tbErrorDescription
        '
        Me.tbErrorDescription.BackColor = System.Drawing.SystemColors.Window
        Me.tbErrorDescription.Dock = System.Windows.Forms.DockStyle.Fill
        Me.tbErrorDescription.Location = New System.Drawing.Point(3, 3)
        Me.tbErrorDescription.Name = "tbErrorDescription"
        Me.tbErrorDescription.ReadOnly = True
        Me.tbErrorDescription.ScrollBars = System.Windows.Forms.ScrollBars.Vertical
        Me.tbErrorDescription.Size = New System.Drawing.Size(480, 20)
        Me.tbErrorDescription.TabIndex = 0
        Me.tbErrorDescription.WordWrap = False
        '
        'Panel1
        '
        Me.Panel1.Dock = System.Windows.Forms.DockStyle.Top
        Me.Panel1.Location = New System.Drawing.Point(5, 51)
        Me.Panel1.Name = "Panel1"
        Me.Panel1.Size = New System.Drawing.Size(492, 10)
        Me.Panel1.TabIndex = 2
        '
        'tlpSystemInformation
        '
        Me.tlpSystemInformation.ColumnCount = 3
        Me.tlpSystemInformation.ColumnStyles.Add(New System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 33.33323!))
        Me.tlpSystemInformation.ColumnStyles.Add(New System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 33.33323!))
        Me.tlpSystemInformation.ColumnStyles.Add(New System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 33.33353!))
        Me.tlpSystemInformation.Controls.Add(Me.gbOperatingSystem, 2, 0)
        Me.tlpSystemInformation.Controls.Add(Me.gbNetFramework, 1, 0)
        Me.tlpSystemInformation.Controls.Add(Me.gbAppVersion, 0, 0)
        Me.tlpSystemInformation.Dock = System.Windows.Forms.DockStyle.Top
        Me.tlpSystemInformation.Location = New System.Drawing.Point(5, 5)
        Me.tlpSystemInformation.Name = "tlpSystemInformation"
        Me.tlpSystemInformation.RowCount = 1
        Me.tlpSystemInformation.RowStyles.Add(New System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100.0!))
        Me.tlpSystemInformation.Size = New System.Drawing.Size(492, 46)
        Me.tlpSystemInformation.TabIndex = 1
        '
        'gbOperatingSystem
        '
        Me.gbOperatingSystem.Controls.Add(Me.tbOperatingSystem)
        Me.gbOperatingSystem.Dock = System.Windows.Forms.DockStyle.Fill
        Me.gbOperatingSystem.Location = New System.Drawing.Point(329, 3)
        Me.gbOperatingSystem.Name = "gbOperatingSystem"
        Me.gbOperatingSystem.Size = New System.Drawing.Size(160, 40)
        Me.gbOperatingSystem.TabIndex = 3
        Me.gbOperatingSystem.TabStop = False
        Me.gbOperatingSystem.Text = "Betriebssystem"
        '
        'tbOperatingSystem
        '
        Me.tbOperatingSystem.BackColor = System.Drawing.SystemColors.Window
        Me.tbOperatingSystem.Dock = System.Windows.Forms.DockStyle.Fill
        Me.tbOperatingSystem.Location = New System.Drawing.Point(3, 16)
        Me.tbOperatingSystem.Name = "tbOperatingSystem"
        Me.tbOperatingSystem.ReadOnly = True
        Me.tbOperatingSystem.Size = New System.Drawing.Size(154, 20)
        Me.tbOperatingSystem.TabIndex = 0
        Me.tbOperatingSystem.Text = "2.1.2.5 InDev - 20121230"
        '
        'gbNetFramework
        '
        Me.gbNetFramework.Controls.Add(Me.tbNetFramework)
        Me.gbNetFramework.Dock = System.Windows.Forms.DockStyle.Fill
        Me.gbNetFramework.Location = New System.Drawing.Point(166, 3)
        Me.gbNetFramework.Name = "gbNetFramework"
        Me.gbNetFramework.Size = New System.Drawing.Size(157, 40)
        Me.gbNetFramework.TabIndex = 2
        Me.gbNetFramework.TabStop = False
        Me.gbNetFramework.Text = ".NET Framework"
        '
        'tbNetFramework
        '
        Me.tbNetFramework.BackColor = System.Drawing.SystemColors.Window
        Me.tbNetFramework.Dock = System.Windows.Forms.DockStyle.Fill
        Me.tbNetFramework.Location = New System.Drawing.Point(3, 16)
        Me.tbNetFramework.Name = "tbNetFramework"
        Me.tbNetFramework.ReadOnly = True
        Me.tbNetFramework.Size = New System.Drawing.Size(151, 20)
        Me.tbNetFramework.TabIndex = 0
        Me.tbNetFramework.Text = "2.1.2.5 InDev - 20121230"
        '
        'gbAppVersion
        '
        Me.gbAppVersion.Controls.Add(Me.tbAppVersion)
        Me.gbAppVersion.Dock = System.Windows.Forms.DockStyle.Fill
        Me.gbAppVersion.Location = New System.Drawing.Point(3, 3)
        Me.gbAppVersion.Name = "gbAppVersion"
        Me.gbAppVersion.Size = New System.Drawing.Size(157, 40)
        Me.gbAppVersion.TabIndex = 0
        Me.gbAppVersion.TabStop = False
        Me.gbAppVersion.Text = "Programmversion"
        '
        'tbAppVersion
        '
        Me.tbAppVersion.BackColor = System.Drawing.SystemColors.Window
        Me.tbAppVersion.Dock = System.Windows.Forms.DockStyle.Fill
        Me.tbAppVersion.Location = New System.Drawing.Point(3, 16)
        Me.tbAppVersion.Name = "tbAppVersion"
        Me.tbAppVersion.ReadOnly = True
        Me.tbAppVersion.Size = New System.Drawing.Size(151, 20)
        Me.tbAppVersion.TabIndex = 0
        Me.tbAppVersion.Text = "2.1.2.5 InDev - 20121230"
        '
        'UserDetails
        '
        Me.AcceptButton = Me.btnSend
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(530, 392)
        Me.Controls.Add(Me.tcInformation)
        Me.Controls.Add(Me.pnlMarginBottom)
        Me.Controls.Add(Me.tlpImageAndDescription)
        Me.Controls.Add(Me.pnlControlButtons)
        Me.MaximizeBox = False
        Me.MinimizeBox = False
        Me.MinimumSize = New System.Drawing.Size(498, 425)
        Me.Name = "UserDetails"
        Me.Padding = New System.Windows.Forms.Padding(10)
        Me.ShowIcon = False
        Me.ShowInTaskbar = False
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "User Details"
        Me.tlpImageAndDescription.ResumeLayout(False)
        CType(Me.pbAppImage, System.ComponentModel.ISupportInitialize).EndInit()
        Me.pnlControlButtons.ResumeLayout(False)
        Me.tcInformation.ResumeLayout(False)
        Me.tabUserDescription.ResumeLayout(False)
        Me.tabUserDescription.PerformLayout()
        Me.tabDetailedInformation.ResumeLayout(False)
        Me.gbErrorDetails.ResumeLayout(False)
        Me.tlpErrorDetails.ResumeLayout(False)
        Me.tlpErrorDetails.PerformLayout()
        Me.tlpSystemInformation.ResumeLayout(False)
        Me.gbOperatingSystem.ResumeLayout(False)
        Me.gbOperatingSystem.PerformLayout()
        Me.gbNetFramework.ResumeLayout(False)
        Me.gbNetFramework.PerformLayout()
        Me.gbAppVersion.ResumeLayout(False)
        Me.gbAppVersion.PerformLayout()
        Me.ResumeLayout(False)

    End Sub
    Friend WithEvents tlpImageAndDescription As System.Windows.Forms.TableLayoutPanel
    Friend WithEvents pbAppImage As System.Windows.Forms.PictureBox
    Friend WithEvents lblDescription As System.Windows.Forms.Label
    Friend WithEvents pnlControlButtons As System.Windows.Forms.Panel
    Friend WithEvents btnSkip As System.Windows.Forms.Button
    Friend WithEvents pnlButtonMargin As System.Windows.Forms.Panel
    Friend WithEvents btnSend As System.Windows.Forms.Button
    Friend WithEvents pnlMarginBottom As System.Windows.Forms.Panel
    Private WithEvents lblModuleName As System.Windows.Forms.Label
    Friend WithEvents tcInformation As System.Windows.Forms.TabControl
    Friend WithEvents tabUserDescription As System.Windows.Forms.TabPage
    Friend WithEvents tbUserDescription As System.Windows.Forms.TextBox
    Friend WithEvents tabDetailedInformation As System.Windows.Forms.TabPage
    Friend WithEvents tlpSystemInformation As System.Windows.Forms.TableLayoutPanel
    Friend WithEvents gbAppVersion As System.Windows.Forms.GroupBox
    Friend WithEvents tbAppVersion As System.Windows.Forms.TextBox
    Friend WithEvents gbOperatingSystem As System.Windows.Forms.GroupBox
    Friend WithEvents tbOperatingSystem As System.Windows.Forms.TextBox
    Friend WithEvents gbNetFramework As System.Windows.Forms.GroupBox
    Friend WithEvents tbNetFramework As System.Windows.Forms.TextBox
    Friend WithEvents gbErrorDetails As System.Windows.Forms.GroupBox
    Friend WithEvents tlpErrorDetails As System.Windows.Forms.TableLayoutPanel
    Friend WithEvents tbErrorInner As System.Windows.Forms.TextBox
    Friend WithEvents tbErrorDescription As System.Windows.Forms.TextBox
    Friend WithEvents Panel1 As System.Windows.Forms.Panel
End Class
