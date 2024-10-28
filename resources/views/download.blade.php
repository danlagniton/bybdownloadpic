<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Report</title>
</head>
<body>
    <h1>Download Report</h1>
    <form id="downloadForm">
        <label for="token">Enter your token:</label>
        <input type="text" id="token" name="token" required>
        <button type="submit">Download Report</button>
    </form>

    <script>
        document.getElementById('downloadForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const token = document.getElementById('token').value;

            fetch(`/download-report/${token}`)
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => {
                            alert(err.error);
                        });
                    }
                    return response.blob();
                })
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'sample-report.pdf';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>
</html>