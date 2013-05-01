Imports ExceptionBase

Public Class MainForm
    Dim ExBase As New ExceptionBase("", 1, ProductVersion.ToString, My.Resources.bug)

    ''' <summary>
    ''' Tries to create an integer with the value "Hello world!" and catches the exception
    ''' </summary>
    Private Sub testDoubleToString(sender As Object, e As EventArgs) Handles btnDoubleToStringError.Click
        Try
            Dim test As Integer = "Hello world!"
        Catch ex As Exception
            ExBase.Track(ex, True)
        End Try
    End Sub

    ''' <summary>
    ''' Tries reading a non-existent file and catchjes the exception
    ''' </summary>
    Private Sub textNonexistentFile(sender As Object, e As EventArgs) Handles btnNonexistentFileError.Click
        Try
            Dim test As String = My.Computer.FileSystem.ReadAllText("C:\SomeNonExistentPath\That\WillNever\Exist.txt")
        Catch ex As Exception
            ExBase.Track(ex, True)
        End Try
    End Sub

    ''' <summary>
    ''' Sends a custom error to the database. Everything can be customized before sending the error
    ''' </summary>
    Private Sub sendCustomError(sender As Object, e As EventArgs) Handles Button1.Click
        ' Gather the needed information first.
        ExBase.GatherInformation()

        ' Customize the data as you like
        With ExBase.Exception
            .Message = "A custom exception!"
            .Inner = "These values can be customized as you want..."
            .UserDescription = InputBox("I can even create a custom user dialog, please enter your description:", "Error:", "Not entered")
            .CustomData = My.Computer.FileSystem.ReadAllBytes("E:\image.png")
            .CustomDataType = DataType.Image
        End With

        ' Send the error to the ExceptionBase.NET database
        ExBase.Send()
    End Sub

    ''' <summary>
    ''' Checks the Server address for it's correctness and enables/disables the buttons
    ''' </summary>
    Private Sub validateServerAdress(sender As Object, e As EventArgs) Handles tbDatabaseAdress.TextChanged
        If tbDatabaseAdress.Text Like "http*://*.*/api/addException*" Then
            ExBase.Server.Server = tbDatabaseAdress.Text
            ExBase.Application.ID = nudAppID.Value
            btnDoubleToStringError.Enabled = True
            btnNonexistentFileError.Enabled = True
            Button1.Enabled = True
        Else
            btnDoubleToStringError.Enabled = False
            btnNonexistentFileError.Enabled = False
            Button1.Enabled = False
        End If
    End Sub

    Private Sub lblProjectDescription_Click(sender As Object, e As EventArgs) Handles lblProjectDescription.Click
        Process.Start("http://exceptionbase.net")
    End Sub

    Private Sub MainForm_Load(sender As Object, e As EventArgs) Handles MyBase.Load

    End Sub
End Class
