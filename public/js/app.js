// Script bersama untuk semua halaman JahitSantai
const I={
 Beranda:'<path d="M3 11l9-8 9 8v10h-6v-7H9v7H3z"/>',
 User:'<circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.5 2.7-6 6-6s6 2.5 6 6z"/><circle cx="17" cy="9" r="2.4"/><path d="M16 14.2c3 0 5 2 5 5.3h-4.5"/>',
 Katalog:'<rect x="3" y="3" width="18" height="5" rx="1"/><path d="M4.5 8v12h15V8M9 12.5h6"/>',
 Pesanan:'<path d="M2 3h3l2.5 12h11L21 6H6.2"/><circle cx="9" cy="20" r="1.4"/><circle cx="18" cy="20" r="1.4"/>',
 Pesan:'<path d="M4 4h16v13H9l-5 4z"/><path d="M8 9h8M8 13h8"/>',
 Ulasan:'<path d="M3 4h18v14h-8l-5 3v-3H3z" /><path d="M8 14l1-3 6-5 2 2-6 5z" fill="currentColor"/>'
};
const LINKS={User:'user.html',Katalog:'katalog.html'};
const nav=document.getElementById('nav');
const current=document.body.dataset.page;
Object.keys(I).forEach(k=>{
  const a=document.createElement('a');
  a.href=LINKS[k]||'#';
  if(k===current)a.classList.add('on');
  a.innerHTML=`<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">${I[k]}</svg><span>${k}</span>`;
  nav.appendChild(a);
});
const trash='<svg viewBox="0 0 24 24" fill="none" stroke="#1E2A4A" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13M10 11v6M14 11v6"/></svg>';
const edit='<svg viewBox="0 0 24 24" fill="none" stroke="#1E2A4A" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6"/><path d="M18.5 3.5l2 2L11 15l-3 1 1-3z"/></svg>';

if(document.getElementById('ub'))document.getElementById('ub').innerHTML=Array(10).fill(`<tr><td>Ghea Anindya</td><td>gheaana@gmail.com</td><td class="c"><span class="badge">User</span></td><td>09/09/2026</td><td class="c"><span class="ico">${trash}</span></td></tr>`).join('');

if(document.getElementById('kb'))document.getElementById('kb').innerHTML=Array(5).fill(`<tr><td>Kustom Kebaya</td><td><span class="thumb"></span></td><td><span class="badge s">Kustom</span></td><td><div class="desc">Tampil anggun dan memukau di setiap momen spesial kini jauh lebih mudah. Melalui layanan...</div></td><td><span class="badge s">Admin</span></td><td><span class="ico">${edit}${trash}</span></td></tr>`).join('');

document.querySelectorAll('[data-pg]').forEach(p=>{
  p.innerHTML=[1,2,3,4,5].map(n=>`<button class="${n===1?'on':''}">${n}</button>`).join('')+'<svg viewBox="0 0 24 24" fill="none" stroke="#1E2A4A" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 6l6 6-6 6M12 6l6 6-6 6"/></svg>';
  p.querySelectorAll('button').forEach(b=>b.onclick=()=>{p.querySelectorAll('button').forEach(x=>x.classList.remove('on'));b.classList.add('on')});
});