function fetchRoleMenus(roleId) {
    if (!roleId) {
        document.getElementById('roleMenus').style.display = 'none';
        return;
    }

    console.log('Fetching menus for role ID:', roleId);

    fetch(`/role-menus/${roleId}`)
        .then(response => response.json())
        .then(data => {
            console.log('Received data for role ID ' + roleId + ':', data);

            const menusPermissions = document.getElementById('menusPermissions');
            menusPermissions.innerHTML = '';

            if (!data.menus || data.menus.length === 0) {
                menusPermissions.innerHTML = '<tr><td colspan="2">No menus found for this role.</td></tr>';
                document.getElementById('roleMenus').style.display = 'block';
                return;
            }

            data.menus.forEach(menu => {
                const tr = document.createElement('tr');

                const tdMenu = document.createElement('td');
                tdMenu.textContent = menu.menu_name;
                tr.appendChild(tdMenu);

                const tdPermissions = document.createElement('td');
                if (menu.permissions && menu.permissions.length > 0) {
                    tdPermissions.textContent = menu.permissions.join(', ');
                } else {
                    tdPermissions.textContent = 'No permissions found.';
                }
                tr.appendChild(tdPermissions);

                menusPermissions.appendChild(tr);
            });

            document.getElementById('roleMenus').style.display = 'block';
        })
        .catch(error => console.error('Error fetching role menus:', error));
}