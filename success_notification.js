
// هذه الدالة لعرض رسالة النجاح عند إتمام الطلب
function showSuccessNotification(message) {
    const notification = document.createElement('div');
    notification.classList.add('success-notification');
    notification.innerText = message;
    
    document.body.appendChild(notification);
    
    // إزالة الرسالة بعد 3 ثوانٍ
    setTimeout(() => {
        notification.remove();
    }, 3000);
}