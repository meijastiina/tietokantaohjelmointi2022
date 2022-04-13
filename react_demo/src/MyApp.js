import axios from 'axios';
import {BrowserRouter, Route, Routes, Outlet, Link} from 'react-router-dom';
import {useState, useEffect} from 'react';
import './style.css';


export function Register(){

    const [fname, setFname] = useState("");
    const [lname, setLname] = useState("");
    const [username, setUname] = useState("");
    const [password, setPw] = useState("");

    function handleSubmit(e){
        e.preventDefault();

        axios.post("http://localhost/person.php",{ fname, lname, username, password })
        .then(res => console.log(res.data))
        .catch(err => console.log(err.response.data));      
      }

    return <div>
      <form onSubmit={handleSubmit}>
        <label>
            First name: <input onChange={e => setFname(e.target.value)} value={fname}></input>
        </label>
        <label>
            Last name: <input onChange={e => setLname(e.target.value)} value={lname}></input>
        </label>
        <label>
            Username: <input onChange={e => setUname(e.target.value)} value={username}></input>
        </label>
        <label>
            Password: <input onChange={e => setPw(e.target.value)} value={password}></input>
        </label>
        <button>Ok</button>
      </form>
      </div>
  }

  export function Login(){

    const [username, setUname] = useState("");
    const [password, setPw] = useState("");

    function handleSubmit(e){
      e.preventDefault();

      const baseCred = Buffer.from(username+':'+password, 'utf8').toString('base64');
      axios.defaults.withCredentials = true;
      axios.post("http://localhost/login.php",null, {headers: {'Authorization': 'Basic ' + baseCred }})
      .then(res => console.log(res.data))
      .catch(err => console.log(err.response.data));      
    }

    return <div>
    <form onSubmit={handleSubmit}>
      <label>
          Username: <input onChange={e => setUname(e.target.value)} value={username}></input>
      </label>
      <label>
          Password: <input onChange={e => setPw(e.target.value)} value={password}></input>
      </label>
      <button>Ok</button>
    </form>
    </div>
  }


export function People(){

  const [info, setInfo] = useState([]);

  useEffect(()=>{
    axios.get('http://localhost/people.php')
    .then(resp => setInfo(resp.data))
    .catch(e=> console.log(e))
  })

  let i = 0;

  return <div>
    <ul>
      {info.map(x => {
        return <li key={i++ + x.lname} >{x.fname}</li>
      })}
    </ul>
    <h1>Common page</h1>
  </div>
}

export function People(){

  const [info, setInfo] = useState([]);

  useEffect(()=>{
    axios.get('http://localhost/people.php')
    .then(resp => setInfo(resp.data))
    .catch(e=> console.log(e))
  })


  let i = 0;

  return <div>
    <ul>
      {info.map(x => {
        return <li key={i++ + x.lname} >{x.fname}</li>
      })}
    </ul>
    <h1>Common page</h1>
  </div>
}