import axios from 'axios';
import {BrowserRouter, Route, Routes, Outlet, Link} from 'react-router-dom';
import {useState} from 'react';

function App() {

  return (

    <BrowserRouter>
      <nav>
        <Link to="/">Home</Link>
        <Link to="user">User</Link>
      </nav>
      <Routes>
        <Route path="/" element={<Home/>}/>
        <Route path="uusi" element={<Uusi/>}/>
        <Route path="user" element={<User/>}>
          <Route path="profile" element={<Profile/>}/>
          <Route path="common" element={<Common/>}/>
        </Route>  
      </Routes>
    </BrowserRouter>
  );
}

function Login(){
  const [fname, setFname] = useState("");
  const [lname, setLname] = useState("");
  const [uname, setUname] = useState("");
  const [pw, setPw] = useState("");
  
  function handleSubmit(e){
    e.preventDefault();
    //useFetchData("http://localhost/person.php",{ fname, lname, uname, pw });
  }

  return( 
    <div>
    <form onSubmit={handleSubmit}>
      <input onChange={e => setFname(e.target.value)} value={fname}></input>
      <input onChange={e => setLname(e.target.value)} value={lname}></input>
      <input onChange={e => setUname(e.target.value)} value={uname}></input>
      <input onChange={e => setPw(e.target.value)} value={pw}></input>
      <button>Ok</button>
    </form>
    </div>
  );
}

function getStaff(myState){

      axios.get('http://localhost/people.php')
      .then(resp => myState(resp.data))
      .catch(e=> console.log(e))
}

export function Common(){

  const [info, setInfo] = useState([]);

  let i = 0;

  return <div>
    <button onClick={()=>getStaff(setInfo)}>Get coffee</button>
    <ul>
      {info.map(x => {
        return <li key={i++ + x.lname} >{x.fname}</li>
      })}
    </ul>
    <h1>Common page</h1>
  </div>
}
export function Profile(){

  const [fname, setFname] = useState("");
  const [lname, setLname] = useState("");


    function handleSubmit(e){
      e.preventDefault();
      
      axios.post('http://localhost/testi.php',{
        "fname":fname,
        "lname":lname
       })
        .then(resp => console.log(resp.data))
        .catch(e=> console.log(e))
    }

  return <div>
    <form onSubmit={handleSubmit}>
      <input onChange={e => setFname(e.target.value)} value={fname}></input>
      <input onChange={e => setLname(e.target.value)} value={lname}></input>
      <button>Ok</button>
    </form>
  </div>
}
export function User(){

  return <div>
      <h1>User</h1>
      <Outlet/>
  </div>
}

export function Home(){
  return <div>
      <h1>Home</h1>
  </div>
}
export function Uusi(){

  function hae(){
    axios.get('http://localhost/data.php')
      .then(resp =>console.log(resp.data))
      .catch(e=> console.log(e))
  }

  return <div>
    <button onClick={()=>hae()}>Hae</button>
    <h1>Uusi</h1>
  </div>
}

export default App;
