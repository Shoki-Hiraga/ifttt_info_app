import requests

url = "https://ift-info.332web.com/api/ifttt/twitter"
headers = {
    "Content-Type": "application/json",
    "X-IFTTT-Secret": "ifttt-secretkey-ift-info"
}
data = {
    "username": "testuser",
    "text": "これはPythonからのテスト投稿です！",
    "created_at": "2025-04-24T12:00:00"
}

response = requests.post(url, json=data, headers=headers)

print("Status Code:", response.status_code)
print("Response:", response.text)
