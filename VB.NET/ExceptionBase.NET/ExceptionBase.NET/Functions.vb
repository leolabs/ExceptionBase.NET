Option Strict On

Module Functions
    Public Function PostURL(ByVal url As String, ByVal arguments As String) As String
        Try
            Dim WebClient As New System.Net.WebClient()

            WebClient.Headers.Add("Content-Type", "application/x-www-form-urlencoded")

            Dim bytArguments As Byte() = System.Text.Encoding.UTF8.GetBytes(arguments)
            Dim bytRetData As Byte() = WebClient.UploadData(url, "POST", bytArguments)

            Return System.Text.Encoding.UTF8.GetString(bytRetData)
        Catch ex As Exception
            Return "0"
        End Try
    End Function
End Module
