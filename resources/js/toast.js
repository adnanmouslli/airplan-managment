import Toastify from 'toastify-js';
import "toastify-js/src/toastify.css";

window.Toast = {
    show(message, type = 'default') {
        const colors = {
            success: "linear-gradient(to right, rgb(34 197 94), rgb(21 128 61))",
            error: "linear-gradient(to right, rgb(239 68 68), rgb(153 27 27))",
            default: "linear-gradient(to right, rgb(59 130 246), rgb(37 99 235))"
        };

        Toastify({
            text: message,
            duration: 3000,
            gravity: "bottom",     // تغيير من top إلى bottom
            position: "right",     // تغيير من center إلى right
            stopOnFocus: true,
            className: "rtl",      // إضافة class للتوجيه
            style: {
                background: colors[type],
                borderRadius: "0.75rem",
                padding: "1rem",
                textAlign: "right",
                direction: "rtl",
                marginBottom: "1rem",    // إضافة هامش من الأسفل
                marginRight: "1rem"      // إضافة هامش من اليمين
            },
            onClick: function(){}
        }).showToast();
    }
};
