document.querySelectorAll('.info-btn').forEach(button => {
    button.addEventListener('click', function() {
        const infoText = this.getAttribute('data-info');
        document.getElementById('infoText').textContent = infoText;
        document.getElementById('infoBox').classList.add('show');
        document.getElementById('infoBox').classList.remove('hidden');
    });
});

document.getElementById('closeInfoBox').addEventListener('click', function() {
    document.getElementById('infoBox').classList.add('hidden');
    document.getElementById('infoBox').classList.remove('show');
});
