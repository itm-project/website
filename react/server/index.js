const express = require('express')
const PORT = process.env.PORT || 5000
var app = express();
var cors = require('cors');
var bodyParser = require('body-parser');
var fs = require('fs')
var responseTime = require('response-time')
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(responseTime((req, res, time) => {
    console.log(`${req.method} ${req.url} ${time}`);
}))

app.post('/iot/add', function (req, res) {
    let body_ins = JSON.stringify(req.body)
    body_ins = JSON.parse(body_ins)
    fs.readFile('./iot.json', 'utf-8', function (err, data) {
        if (!err) {
            let body = JSON.parse(data)
            body.push(body_ins)
            res.send((body))
            fs.writeFile('./iot.json', JSON.stringify(body), function (err) {
                if (err) throw err;
            })
        }
    })
})

app.get('/iot/get', (req, res) => {
    var person_data;
    var iot_data;
    var obj = [];
    fs.readFile('./iot.json', 'utf-8', function (err, data) {
        if (!err) {
            iot_data = JSON.parse(data);
            fs.readFile('./person_data.json', 'utf-8', function (err, data) {
                if (!err) {
                    person_data = JSON.parse(data)
                    iot_data.map(iot => {
                        person_data.map(pers => {
                            if (iot.stu_num === pers.stu_num) {
                                let o = {
                                    stu_num: iot.stu_num,
                                    name: pers.name,
                                    phone: pers.phone,
                                    email: pers.email,
                                    temp: iot.temp,
                                    date: iot.date,
                                    time: iot.time
                                }
                                obj.push(o)
                                return;
                            }
                        })
                    })
                    res.send(obj.reverse())
                }
            })
        }
    })
})

app.get('/iot/search/:id', (req, res) => {
    var person_data;
    var iot_data;
    var obj = [];
    fs.readFile('./iot.json', 'utf-8', function (err, data) {
        if (!err) {
            iot_data = JSON.parse(data);
            fs.readFile('./person_data.json', 'utf-8', function (err, data) {
                if (!err) {
                    person_data = JSON.parse(data)
                    iot_data.map(iot => {
                        person_data.map(pers => {
                            if (iot.stu_num === pers.stu_num && (JSON.stringify(iot).search(req.params.id) != -1 ||
                                JSON.stringify(pers).search(req.params.id) != -1)) {
                                let o = {
                                    stu_num: iot.stu_num,
                                    name: pers.name,
                                    phone: pers.phone,
                                    email: pers.email,
                                    temp: iot.temp,
                                    date: iot.date,
                                    time: iot.time
                                }
                                obj.push(o)
                                return;
                            }
                        })
                    })
                    res.send(obj.reverse())
                }
            })
        }
    })
})

app.get('/iot/get/month', (req, res) => {
    var person_data;
    var iot_data;
    let date_ob = new Date();
    var obj = [];
    fs.readFile('./iot.json', 'utf-8', function (err, data) {
        if (!err) {
            iot_data = JSON.parse(data);
            fs.readFile('./person_data.json', 'utf-8', function (err, data) {
                if (!err) {
                    person_data = JSON.parse(data)
                    iot_data.map(iot => {
                        person_data.map(pers => {
                            let a = iot.date.split('/')
                            if (iot.stu_num === pers.stu_num && a[1] == (date_ob.getMonth() + 1).toString()) {
                                let o = {
                                    stu_num: iot.stu_num,
                                    name: pers.name,
                                    phone: pers.phone,
                                    email: pers.email,
                                    temp: iot.temp,
                                    date: iot.date,
                                    time: iot.time
                                }
                                obj.push(o)
                                return;
                            }
                        })
                    })
                    res.send(obj.reverse())
                }
            })
        }
    })
})

app.get('/iot/search/month/:id', (req, res) => {
    var person_data;
    var iot_data;
    let date_ob = new Date();
    var obj = [];
    fs.readFile('./iot.json', 'utf-8', function (err, data) {
        if (!err) {
            iot_data = JSON.parse(data);
            fs.readFile('./person_data.json', 'utf-8', function (err, data) {
                if (!err) {
                    person_data = JSON.parse(data)
                    iot_data.map(iot => {
                        person_data.map(pers => {
                            let a = iot.date.split('/')
                            if (iot.stu_num === pers.stu_num && a[1] == (date_ob.getMonth() + 1).toString() && (JSON.stringify(iot).search(req.params.id) != -1 ||
                                JSON.stringify(pers).search(req.params.id) != -1)) {
                                let o = {
                                    stu_num: iot.stu_num,
                                    name: pers.name,
                                    phone: pers.phone,
                                    email: pers.email,
                                    temp: iot.temp,
                                    date: iot.date,
                                    time: iot.time
                                }
                                obj.push(o)
                                return;
                            }
                        })
                    })
                    res.send(obj.reverse())
                }
            })
        }
    })
})

app.get('/iot/get/week', (req, res) => {
    var person_data;
    var iot_data;
    var obj = [];
    var date_ob = new Date();
    var minWeek = date_ob.getDate() - date_ob.getDay()
    var maxWeek = minWeek + 6;
    fs.readFile('./iot.json', 'utf-8', function (err, data) {
        if (!err) {
            iot_data = JSON.parse(data);
            fs.readFile('./person_data.json', 'utf-8', function (err, data) {
                if (!err) {
                    person_data = JSON.parse(data)
                    iot_data.map(iot => {
                        person_data.map(pers => {
                            let a = iot.date.split('/');
                            let date = new Date(a[2], +a[1] - 1, a[0]);
                            if (iot.stu_num === pers.stu_num && a[1] == (date_ob.getMonth() + 1).toString() && date.getDate() >= minWeek && date.getDate() <= maxWeek) {
                                let o = {
                                    stu_num: iot.stu_num,
                                    name: pers.name,
                                    phone: pers.phone,
                                    email: pers.email,
                                    temp: iot.temp,
                                    date: iot.date,
                                    time: iot.time
                                }
                                obj.push(o)
                                return;
                            }
                        })
                    })
                    res.send(obj.reverse())
                }
            })
        }
    })
})

app.get('/iot/search/week/:id', (req, res) => {
    var person_data;
    var iot_data;
    var obj = [];
    var date_ob = new Date();
    var minWeek = date_ob.getDate() - date_ob.getDay()
    var maxWeek = minWeek + 6;
    fs.readFile('./iot.json', 'utf-8', function (err, data) {
        if (!err) {
            iot_data = JSON.parse(data);
            fs.readFile('./person_data.json', 'utf-8', function (err, data) {
                if (!err) {
                    person_data = JSON.parse(data)
                    iot_data.map(iot => {
                        person_data.map(pers => {
                            let a = iot.date.split('/');
                            let date = new Date(a[2], +a[1] - 1, a[0]);
                            if (iot.stu_num === pers.stu_num && a[1] == (date_ob.getMonth() + 1).toString() && date.getDate() >= minWeek &&
                                date.getDate() <= maxWeek && (JSON.stringify(iot).search(req.params.id) != -1 || JSON.stringify(pers).search(req.params.id) != -1)) {
                                let o = {
                                    stu_num: iot.stu_num,
                                    name: pers.name,
                                    phone: pers.phone,
                                    email: pers.email,
                                    temp: iot.temp,
                                    date: iot.date,
                                    time: iot.time
                                }
                                obj.push(o)
                                return;
                            }
                        })
                    })
                    res.send(obj.reverse())
                }
            })
        }
    })
})

app.get('/iot/get/day', (req, res) => {
    var person_data;
    var iot_data;
    var obj = [];
    var date_ob = new Date();
    fs.readFile('./iot.json', 'utf-8', function (err, data) {
        if (!err) {
            iot_data = JSON.parse(data);
            fs.readFile('./person_data.json', 'utf-8', function (err, data) {
                if (!err) {
                    person_data = JSON.parse(data)
                    iot_data.map(iot => {
                        person_data.map(pers => {
                            let a = iot.date.split('/');
                            let date = new Date(a[2], +a[1] - 1, a[0]);
                            if (iot.stu_num === pers.stu_num && date.getDate() === date_ob.getDate() && date.getMonth() === date_ob.getMonth() &&
                                date.getFullYear() === date_ob.getFullYear()) {
                                let o = {
                                    stu_num: iot.stu_num,
                                    name: pers.name,
                                    phone: pers.phone,
                                    email: pers.email,
                                    temp: iot.temp,
                                    date: iot.date,
                                    time: iot.time
                                }
                                obj.push(o)
                                return;
                            }
                        })
                    })
                    res.send(obj.reverse())
                }
            })
        }
    })
})

app.get('/iot/search/day/:id', (req, res) => {
    var person_data;
    var iot_data;
    var obj = [];
    var date_ob = new Date();
    fs.readFile('./iot.json', 'utf-8', function (err, data) {
        if (!err) {
            iot_data = JSON.parse(data);
            fs.readFile('./person_data.json', 'utf-8', function (err, data) {
                if (!err) {
                    person_data = JSON.parse(data)
                    iot_data.map(iot => {
                        person_data.map(pers => {
                            let a = iot.date.split('/');
                            let date = new Date(a[2], +a[1] - 1, a[0]);
                            if (iot.stu_num === pers.stu_num && date.getDate() === date_ob.getDate() && date.getMonth() === date_ob.getMonth() &&
                                date.getFullYear() === date_ob.getFullYear() && (JSON.stringify(iot).search(req.params.id) != -1 ||
                                    JSON.stringify(pers).search(req.params.id) != -1)) {
                                let o = {
                                    stu_num: iot.stu_num,
                                    name: pers.name,
                                    phone: pers.phone,
                                    email: pers.email,
                                    temp: iot.temp,
                                    date: iot.date,
                                    time: iot.time
                                }
                                obj.push(o)
                                return;
                            }
                        })
                    })
                    res.send(obj.reverse())
                }
            })
        }
    })
})

app.get('/user', (req, res) => {
    fs.readFile('./user.json', 'utf-8', function (err, data) {
        if (!err) {
            res.send((data));
            res.status(200)
        }
    })
})

app.get('/person_data/search/:id', (req, res) => {
    fs.readFile('./person_data.json', 'utf-8', function (err, data) {
        if (!err) {
            let just = []
            let body = JSON.parse(data)
            body.map(bo => {
                if (JSON.stringify(bo).search(req.params.id) != -1) {
                    just.push(bo)
                }
                console.log("bo : " + bo.stu_num)
            })
            res.send(just);
        }
        else
            res.send('Error');
    })
})

app.get('/person_data/', (req, res) => {
    fs.readFile('./person_data.json', 'utf-8', function (err, data) {
        if (!err) {
            res.send(JSON.parse(data));
        }
    })
})

app.put('/person_data/edit/:id', (req, res) => {
    fs.readFile('./person_data.json', 'utf-8', function (err, data) {
        if (!err) {
            let body = JSON.parse(data)
            let i = 0;
            body.map(val => {
                if (val.stu_num == req.params.id) {
                    console.log("val : " + val.stu_num + " , req : " + req.params.id)
                    console.log(req.body)
                    Object.assign(body[i], req.body)
                    return;
                }
                i++
            })
            res.send(body)
            fs.writeFile('./person_data.json', JSON.stringify(body), function (err) {
                if (err) throw err;
            })
        }
    })
})

app.post('/person_data/add', (req, res) => {
    let body_ins = req.body
    fs.readFile('./person_data.json', 'utf-8', function (err, data) {
        if (!err) {
            let body = JSON.parse(data)
            let i = 0
            body.map(bo => {
                if (bo.stu_num == req.body.stu_num) {
                    i++;
                }
            })
            if (i == 0) {
                body.push(body_ins)
                res.send((body))
                fs.writeFile('./person_data.json', JSON.stringify(body), function (err) {
                    if (err) throw err;
                })
            }
        }
    })
})

app.delete('/delete_person/:id', (req, res) => {
    fs.readFile('./person_data.json', 'utf-8', function (err, data) {
        if (!err) {
            let body = JSON.parse(data)
            let i = 0;
            body.map(val => {
                if (val.stu_num == req.params.id) {
                    console.log("val : " + val.stu_num + " , req : " + req.params.id)
                    body.splice(i, 1)
                    return;
                }
                i++
            })
            res.send(body)
            fs.writeFile('./person_data.json', JSON.stringify(body), function (err) {
                if (err) throw err;
            })
        }
    })
})

app.listen(PORT, () => {
    console.log(`Listening on ${PORT}`)
})
