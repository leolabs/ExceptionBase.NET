Option Strict On

Imports System.Collections.Specialized

Module Functions
    Public Function PostURL(ByVal URL As String, ByVal Arguments As NameValueCollection) As String
        Try
            Dim WebClient As New System.Net.WebClient()

            WebClient.Headers.Add("Content-Type", "application/x-www-form-urlencoded")

            Dim bytRetData As Byte() = WebClient.UploadValues(URL, "POST", Arguments)

            Return System.Text.Encoding.UTF8.GetString(bytRetData)
        Catch ex As Exception
            Return "0"
        End Try
    End Function

    Public Function URLFriendly(ByVal url As String) As String
        Return url.Replace("&", "%26").Replace("?", "%3F")
    End Function
End Module
