const navItems = document.querySelector('.nav-items');
const openNavBtn = document.querySelector('#open-nav-btn');
const closeNavBtn = document.querySelector('#close-nav-btn');

//opens nav dropdown
const openNav = () => {
    navItems.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display = 'inline-block';
}

//closes nav dropdown
const closeNav = () => {
    navItems.style.display = 'none';
    openNavBtn.style.display = 'inline-block';
    closeNavBtn.style.display = 'none';
}


openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);

const sidebar = document.querySelector('aside');
const ShowSidebarBtn = document.querySelector('#show-sidebar-btn');
const HideSidebarBtn = document.querySelector('#hide-sidebar-btn');

// shows sidebar on small devices
const ShowSidebar = () => {
    sidebar.style.left = '0';
    ShowSidebarBtn.style.display = 'none';
    HideSidebarBtn.style.display = 'inline-block';
}

//hide sidebar on small devices
const HideSidebar = () => {
    sidebar.style.left = '-100%';
    ShowSidebarBtn.style.display = 'inline-block';
    HideSidebarBtn.style.display = 'none';
}

ShowSidebarBtn.addEventListener('click', ShowSidebar);
HideSidebarBtn.addEventListener('click', HideSidebar);