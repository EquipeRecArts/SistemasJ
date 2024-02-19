const id = '#example';
const totalElements = 24;


for (let i = 0; i <= totalElements; i++) {
    let parameter = `${id}-${i}`
    new DataTable(parameter);
}


// new DataTable('#example');
// new DataTable('#example-2');
// new DataTable('#example-3');
// new DataTable('#example-4');