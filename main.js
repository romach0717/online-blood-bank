function validateDonorForm() {
    const form = document.getElementById('donorForm');
    const age = parseInt(form.age.value, 10);
    if (isNaN(age) || age < 18 || age > 65) {
        alert('Age 18-65 required.');
        form.age.focus();
        return false;
    }
    if (!form.email.value.trim()) { alert('Email required.'); form.email.focus(); return false; }
    if (!form.phone.value.trim()) { alert('Phone required.'); form.phone.focus(); return false; }
    return true;
}

function validateRequestForm() {
    const form = document.getElementById('requestForm');
    const units = parseInt(form.units.value, 10);
    if (isNaN(units) || units < 1 || units > 10) {
        alert('Units must be between 1 and 10.');
        form.units.focus();
        return false;
    }
    if (!form.contact.value.trim()) { alert('Contact required.'); form.contact.focus(); return false; }
    return true;
}
