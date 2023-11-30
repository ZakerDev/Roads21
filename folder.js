const foldersData = [
    {
        name: 'Folder 1',
        type: 'folder',
        items: [
            { name: 'File 1.txt', type: 'file' },
            { name: 'File 2.txt', type: 'file' }
        ]
    },
    {
        name: 'Folder 2',
        type: 'folder',
        items: [
            { name: 'File 3.txt', type: 'file' },
            { name: 'Subfolder 1', type: 'folder', items: [] }
        ]
    }
    // ... и так далее
];

const foldersList = document.getElementById('folders-list');

// Функция для отображения содержимого папок
function displayFolders(data, parentElement) {
    data.forEach(item => {
        const listItem = document.createElement('div');
        listItem.classList.add('folder-item');

        if (item.type === 'folder') {
            listItem.innerHTML = `<span class="folder">${item.name}</span>`;
            if (item.items && item.items.length > 0) {
                const subList = document.createElement('div');
                subList.classList.add('sub-list');
                listItem.appendChild(subList);
                displayFolders(item.items, subList);
            }
        } else {
            listItem.innerHTML = `<span class="file">${item.name}</span>`;
        }

        parentElement.appendChild(listItem);
    });
}

// Отобразить папки внутри элемента #folders-list
displayFolders(foldersData, foldersList);