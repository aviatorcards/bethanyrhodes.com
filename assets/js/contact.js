document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('contact-form');
  const messageDiv = document.getElementById('form-message');
  const submitBtn = form.querySelector('button[type="submit"]');
  const btnText = submitBtn.querySelector('.btn-text');
  const btnLoading = submitBtn.querySelector('.btn-loading');

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    submitBtn.disabled = true;
    btnText.style.display = 'none';
    btnLoading.style.display = 'inline-block';
    messageDiv.style.display = 'none';

    const formData = new FormData();
    formData.append('action', 'bethany_contact');
    formData.append('nonce', bethanyContact.nonce);
    formData.append('name', form.name.value);
    formData.append('email', form.email.value);
    formData.append('phone', form.phone.value);
    formData.append('inquiry_type', form.inquiry_type.value);
    formData.append('event_date', form.event_date.value);
    formData.append('message', form.message.value);

    fetch(bethanyContact.ajaxUrl, { method: 'POST', body: formData })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (data.success) {
          messageDiv.className = 'form-message success';
          messageDiv.textContent = 'Thank you! Your message has been sent successfully. Bethany will get back to you soon.';
          form.reset();
        } else {
          messageDiv.className = 'form-message error';
          messageDiv.textContent = 'Oops! Something went wrong. Please try again or email booking@bethanyrhodes.com directly.';
        }
        messageDiv.style.display = 'block';
        submitBtn.disabled = false;
        btnText.style.display = 'inline-block';
        btnLoading.style.display = 'none';
      })
      .catch(function () {
        messageDiv.className = 'form-message error';
        messageDiv.textContent = 'Oops! Something went wrong. Please try again or email booking@bethanyrhodes.com directly.';
        messageDiv.style.display = 'block';
        submitBtn.disabled = false;
        btnText.style.display = 'inline-block';
        btnLoading.style.display = 'none';
      });
  });
});
