document.addEventListener('DOMContentLoaded', () => {
    renderNav();
    loadUsers();

    // Dropdown profil admin
    const meBtn = document.getElementById('meBtn');
    const meMenu = document.getElementById('meMenu');
    meBtn.addEventListener('click', (e) => {
        meMenu.classList.toggle('on');
        e.stopPropagation();
    });
    document.addEventListener('click', () => meMenu.classList.remove('on'));
});

let allUsers = [];

function loadUsers() {
    fetch('/api/users')
        .then(r => r.json())
        .then(data => {
            allUsers = data.data || [];
            renderUserTable(allUsers);
        })
        .catch(err => console.error('Gagal load users:', err));
}

const bellBtn = document.getElementById('bellBtn');
const notifMenu = document.getElementById('notifMenu');
bellBtn.addEventListener('click', (e) => {
    notifMenu.classList.toggle('on');
    e.stopPropagation();
});
document.addEventListener('click', () => notifMenu.classList.remove('on'));

function renderUserTable(users) {
    const ub = document.getElementById('ub');
    if (users.length === 0) {
        ub.innerHTML = `<tr><td colspan="5" class="stub">Tidak ada data yang cocok.</td></tr>`;
        return;
    }
    ub.innerHTML = users.map(u => `
        <tr>
            <td>${u.name}</td>
            <td>${u.email}</td>
            <td class="c"><span class="badge">${u.role}</span></td>
            <td>${new Date(u.created_at).toLocaleDateString('id-ID')}</td>
            <td class="c">
                <button class="del-btn" data-id="${u.id}" aria-label="Hapus akun">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0-1 14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 6h16Z"/>
                    </svg>
                </button>
            </td>
        </tr>`).join('');
}
document.getElementById('searchAkun').addEventListener('input', applyFilters);
document.getElementById('roleFilter').addEventListener('change', applyFilters);

function applyFilters() {
    const keyword = document.getElementById('searchAkun').value.toLowerCase();
    const role = document.getElementById('roleFilter').value;
    const filtered = allUsers.filter(u => {
        const matchKeyword = u.name.toLowerCase().includes(keyword) || u.email.toLowerCase().includes(keyword);
        const matchRole = role === 'all' || u.role === role;
        return matchKeyword && matchRole;
    });
    renderUserTable(filtered);
}

function renderNav() {
    const menuItems = [
        { label: 'Beranda', href: '/dashboard', icon: '<path d="M3 12l9-9 9 9M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/>' },
        { label: 'User', href: '/dashboarduser', icon: '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>' },
        { label: 'Katalog', href: '/dashboardkatalog', icon: '<path d="M21 8V21H3V8"/><path d="M1 3h22v5H1z"/><path d="M10 12h4"/>' }, { label: 'Pesanan', href: '/dashboardpesanan', icon: '<circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>' },
        { label: 'Pesan', href: '/dashboardpesan', icon: '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>' },
        { label: 'Ulasan', href: '/dashboardulasan', icon: '<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4z"/>' },
    ];

    const currentPage = document.body.dataset.page;
    const nav = document.getElementById('nav');
    nav.innerHTML = menuItems.map(item => `
        <a href="${item.href}" class="${item.label === currentPage ? 'on' : ''}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${item.icon}</svg>
            <span>${item.label}</span>
        </a>`).join('');
}

function loadUsers() {
    fetch('/api/users')
        .then(r => r.json())
        .then(data => {
            const ub = document.getElementById('ub');
            if (!data.data || data.data.length === 0) {
                ub.innerHTML = `<tr><td colspan="5" class="stub">Belum ada data user.</td></tr>`;
                return;
            }
            ub.innerHTML = data.data.map(u => `
                <tr>
                    <td>${u.name}</td>
                    <td>${u.email}</td>
                    <td class="c"><span class="badge">${u.role}</span></td>
                    <td>${new Date(u.created_at).toLocaleDateString('id-ID')}</td>
                    <td class="c">
                        <button class="del-btn" data-id="${u.id}" aria-label="Hapus akun">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0-1 14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 6h16Z"/>
                            </svg>
                        </button>
                    </td>
                </tr>`).join('');
        })
        .catch(err => console.error('Gagal load users:', err));
}

document.getElementById('ub')?.addEventListener('click', (e) => {
    const btn = e.target.closest('.del-btn');
    if (!btn) return;
    if (!confirm('Hapus akun ini?')) return;
    fetch(`/api/users/${btn.dataset.id}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
    }).then(() => btn.closest('tr').remove());
});