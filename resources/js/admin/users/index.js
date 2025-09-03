import axios from 'axios';
import { initFlowbite, Modal } from 'flowbite';

document.addEventListener("DOMContentLoaded", () => {
    const tableBody = document.querySelector("#users-table-body");
    const filterSelect = document.querySelector("#filter-select");
    const searchInput = document.querySelector("#table-search");
    const filterRole = document.querySelector("#filter-role");

    let usersData = []; // ذخیره کاربران برای دسترسی هنگام ویرایش

    function loadUsers(filter = null, page = 1, search = null, filterRole = null) {
        let url = `/admin/users/index?page=${page}`;
        if (filter) url += `&filter=${filter}`;
        if (search !== null) url += `&search=${search}`;
        if (filterRole !== null) url += `&filterRole=${filterRole}`;

        axios.get(url)
            .then(response => {
                usersData = response.data.users.data; // ذخیره برای ویرایش
                renderTable(usersData);
                initFlowbite();
                attachEditEvents();
            })
            .catch(error => console.error(error));
    }

    function renderTable(users) {
        tableBody.innerHTML = "";
        users.forEach(user => {
            const row = `
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm">
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${user.id}</th>
                    <td class="px-6 py-4">${user.name}</td>
                    <td class="px-6 py-4">${user.roles.length > 0 ? user.roles[0].name : 'No Role'}</td>
                    <td class="px-6 py-4">${user.email}</td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline edit-user-btn" data-user-id="${user.id}" data-modal-target="crud-modal" data-modal-toggle="crud-modal">ویرایش</a>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML("beforeend", row);
        });
    }

    function attachEditEvents() {
        const editButtons = document.querySelectorAll(".edit-user-btn");
        editButtons.forEach(btn => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                const userId = btn.dataset.userId;
                const user = usersData.find(u => u.id == userId);
                if (!user) return;

                // پر کردن فرم مودال
                const form = document.querySelector("#edit-user-form");
                form.dataset.userId = user.id; // ذخیره آیدی برای submit
                form.querySelector("#name").value = user.name || '';
                form.querySelector("#email").value = user.email || '';
                form.querySelector("#role").value = user.roles.length > 0 ? user.roles[0].name : '';

                // نمایش مودال
                const modalEl = document.getElementById('crud-modal');
                const modal = new window.Modal(modalEl);
                modal.show();
            });
        });
    }

    // submit فرم
    const editForm = document.querySelector("#edit-user-form");


    editForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const userId = editForm.dataset.userId;

        const payload = {
            id: userId,
            name: editForm.querySelector("#name").value,
            email: editForm.querySelector("#email").value,
            role: editForm.querySelector("#role").value,
        };

        axios.post(`/admin/users/createOrEdit`, payload)
            .then(response => {
                // موفقیت: بستن مودال و رفرش جدول
                const modalEl = document.getElementById('crud-modal');
                let modal = new Modal(modalEl);          // modal.hide();
                modal.hide();

                const successNotification = document.getElementById('success_notification');
                successNotification.hidden = false; // unhide it

                // Optionally, hide it after 3-5 seconds
                setTimeout(() => {
                    successNotification.hidden = true;
                }, 4000);                // آپدیت جدول
                loadUsers();
            })
            .catch(error => {
                console.error(error);
                alert("خطا در به‌روزرسانی کاربر!");
            });
    });

    // Initial load
    loadUsers();

    // Filter events
    if(filterSelect) filterSelect.addEventListener("change", () => loadUsers(filterSelect.value));
    if(searchInput) searchInput.addEventListener("input", () => {
        const filter = filterSelect ? filterSelect.value : null;
        loadUsers(filter, 1, searchInput.value);
    });
    if(filterRole) filterRole.addEventListener("change", () => {
        const filter = filterSelect ? filterSelect.value : null;
        loadUsers(filter, 1, searchInput.value, filterRole.value);
    });
});
