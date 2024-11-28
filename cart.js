// هذه الدالة لعرض رسالة النجاح عند إتمام الطلب
function addToCart(propertyId) {
    // يمكنك تخزين المعرف (propertyId) في الجلسة أو في ملف تعريف الكوكيز.
    alert("تم إضافة العقار إلى السلة!");
}

// رسالة نجاح عند إضافة عقار للسلة
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
