var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("today").forEach((date) => {
        date.setAttribute('value', today);
    })

