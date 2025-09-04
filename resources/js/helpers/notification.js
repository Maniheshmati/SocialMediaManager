export function showNotification(type, message, duration = 3000) {
    const container = document.getElementById("notification-container");

    if (!container) {
        console.error("⚠️ Missing #notification-container in layout");
        return;
    }

    const variants = {
        success: {
            icon: `
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51
                        9.51 0 0 0 10 .5Zm3.707
                        8.207-4 4a1 1 0 0 1-1.414
                        0l-2-2a1 1 0 1 1
                        1.414-1.414L9 10.586l3.293-3.293a1
                        1 0 0 1 1.414 1.414Z"/>
                </svg>`,
            iconClasses: "text-green-500 bg-green-100 dark:bg-green-800 dark:text-green-200"
        },
        error: {
            icon: `
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10A8 8 0 1
                        1 2 10a8 8 0 0 1 16
                        0Zm-7 4a1 1 0 1 1-2
                        0 1 1 0 0 1 2
                        0Zm-1-9a1 1 0 0 1 1
                        1v5a1 1 0 1 1-2
                        0V6a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                </svg>`,
            iconClasses: "text-red-500 bg-red-100 dark:bg-red-800 dark:text-red-200"
        },
        warning: {
            icon: `
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36
                        2.721-1.36 3.486 0l6.516
                        11.59c.75 1.336-.213
                        3.01-1.743 3.01H3.484c-1.53
                        0-2.493-1.674-1.743-3.01l6.516-11.59zM11
                        14a1 1 0 1 1-2 0 1 1
                        0 0 1 2 0zm-1-2a1 1 0 0
                        1-1-1V7a1 1 0 1 1 2 0v4a1
                        1 0 0 1-1 1z" clip-rule="evenodd"/>
                </svg>`,
            iconClasses: "text-yellow-500 bg-yellow-100 dark:bg-yellow-800 dark:text-yellow-200"
        },
        info: {
            icon: `
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10A8 8 0 1
                        1 2 10a8 8 0 0 1 16
                        0Zm-8-3a1 1 0 1 0 0-2
                        1 1 0 0 0 0 2Zm1 2a1
                        1 0 0 0-2 0v4a1 1 0 0 0 2
                        0v-4z" clip-rule="evenodd"/>
                </svg>`,
            iconClasses: "text-blue-500 bg-blue-100 dark:bg-blue-800 dark:text-blue-200"
        }
    };

    const v = variants[type] || variants.info;

    const toast = document.createElement("div");
    toast.className =
        "flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800";
    toast.setAttribute("role", "alert");

    toast.innerHTML = `
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 rounded-lg ${v.iconClasses}">
            ${v.icon}
        </div>
        <div class="ms-3 text-sm font-normal">${message}</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900
                   rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100
                   inline-flex items-center justify-center h-8 w-8
                   dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            aria-label="Close">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    `;

    toast.querySelector("button").addEventListener("click", () => toast.remove());

    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.add("opacity-0", "transition-opacity");
        setTimeout(() => toast.remove(), 300);
    }, duration);
}
