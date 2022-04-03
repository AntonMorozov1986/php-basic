async function sendPostRequest(url, data = '') {
    const settings = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data),
    }
    const response = await fetch(url, settings)
    return response.json();
}

async function sendFormRequest(url, form = new FormData) {
    const settings = {
        method: 'POST',
        body: form,
    }
    const response = await fetch(url, settings)
    return response.json();
}

async function sendGetRequest(url) {
    const settings = {
        method: 'GET',
    }
    const response = await fetch(url, settings)
    return response.json();
}
