const input = document.getElementById('numbersInput');

function appendToDisplay(content) {
    input.value += content;
}

let qwe = document.getElementsByClassName('btnBtn')
for (const item of qwe) {
    item.addEventListener('click', () => {
        input.value += item.textContent
    })
}
console.log(qwe);
document.getElementById('clearBtn').addEventListener('click', () => {
    input.value = '';
})

document.getElementById('calc').addEventListener('click', () => {
        const problem = input.value;
        fetch('main.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `problem=${encodeURIComponent(problem)}`
        })
        .then(response => response.text())
        .then(result => {
            window.location.href = `${window.location.pathname}?result=${encodeURIComponent(result)}`;
        })
        .catch(error => console.error('Ошибка:', error));
})

document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const result = urlParams.get('result');
    if (result) {
        input.value = decodeURIComponent(result);
    }
});
