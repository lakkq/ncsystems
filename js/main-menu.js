const mainMenu = document.querySelector('.main-menu');
const menuItems = document.querySelectorAll('.main-menu__row>li');
const subMenuItems = document.querySelectorAll('.sub-menu>li');
const buttonClose = document.querySelector('#main-menu-button');
const buttonOpen = document.querySelector('#call-menu-button');
const curtain = document.querySelector('.main-menu__curtain');

function addButton(block) {
    if (window.innerWidth < 1024 && block.children.length > 1) {
        block.insertAdjacentHTML('beforeend', `
        <div class="adaptive-el-button" id="adaptive-el-button">
        <div class="triangle">
        </div>
        </div>
        `)
    }
}

menuItems.forEach((menuItem) => {
    menuItem.addEventListener('mouseenter', hoverItemMenu);
    menuItem.addEventListener('mouseleave', unhoverItemMenu);
    addButton(menuItem);
});

subMenuItems.forEach((subMenuItem) => {
    subMenuItem.addEventListener('mouseenter', hoverItemMenu);
    subMenuItem.addEventListener('mouseleave', unhoverItemMenu);
    if (window.innerWidth < 1024 && subMenuItem.children.length > 1) {
        subMenuItem.insertAdjacentHTML('beforeend', `
        <div class="adaptive-el-sub-button" id="adaptive-el-sub-button">
            <div class="triangle">
            </div>
        </div>
        `)
        if (window.innerWidth > 768) {
            subMenuItem.children[0].style = 'padding: 10px 20px 10px 5px';
        }
    }
})

mainMenu.addEventListener('mouseenter', hoverMenu);
mainMenu.addEventListener('mouseleave', unhoverMenu);


buttonOpen.addEventListener('click', callMenu);
buttonClose.addEventListener('click', closeMenu);
curtain.addEventListener('click', closeMenu);

function callMenu() {
    if (window.innerWidth < 768) {
        mainMenu.style.cssText = `
        transform: translate(0, 0);
        `;
    } else {
        mainMenu.style.cssText = `
        transform: translate(-50%, 0);
        `;
    }
    if (window.innerWidth < 1028) {
        buttonClose.style.cssText = `
        transform: translate(0, 0);
        transition-duration: 1000ms;
        `;
    }
    curtain.style.display = 'block';
}

function closeMenu() {
    if (window.innerWidth < 768) {
        mainMenu.style.cssText = `
        transform: translate(0, -100%);
        `;
    } else {
        mainMenu.style.cssText = `
        transform: translate(-50%, -100%);
        `;
    }
    if (window.innerWidth < 1028) {
        buttonClose.style.cssText = `
        transform: translate(0, -101%);
        transition-duration: 1000ms;
        `;
    }
    curtain.style.display = 'none';
}

function hoverMenu() {
    buttonClose.style.cssText = `
    transform: translate(0, 0);
    `;
}

function unhoverMenu() {
    if (window.innerWidth >= 1028) {
        buttonClose.style.cssText = `
    transform: translate(0, -101%);
    `;
    }
}

function hoverItemMenu(event) {
    if (window.innerWidth > 768) {
        menuItems.forEach((menuItem) => {
            if (menuItem.id !== event.srcElement.id) {
                menuItem.classList.add('unactive-item-menu');
            }
        });
        subMenuItems.forEach((subMenuItem) => {
            if (subMenuItem.id !== event.srcElement.id) {
                subMenuItem.classList.add('unactive-item-menu');
            }
        });
        document.querySelector(`#${event.srcElement.id}`).classList.add('active-item-menu');
    }
}

function unhoverItemMenu() {
    if (window.innerWidth > 768) {
        menuItems.forEach((menuItem) => {
            menuItem.classList.remove('active-item-menu');
            menuItem.classList.remove('unactive-item-menu');
        })
        subMenuItems.forEach((subMenuItem) => {
            subMenuItem.classList.remove('active-item-menu');
            subMenuItem.classList.remove('unactive-item-menu');
        });
    }
}




