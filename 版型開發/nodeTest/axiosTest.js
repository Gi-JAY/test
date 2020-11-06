
axios.post('http://localhost:8081', { first_name: 'abv', last_name: 'acc' })
    .then(res => {
        console.log(res.data);
    })