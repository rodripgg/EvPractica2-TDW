import { useState } from 'react'
import './App.css'
import axios from 'axios';
const apiUrl = import.meta.env.VITE_API_URL;

import interacciones from './pages/Interacciones';

function App() {

  //Realiza una solicitud de ejemplo utilizando axios
  const verPerros = async () => {
    axios.get(`${apiUrl}/interacciones`)
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        console.error(error);
      });
  }
  console.log("viendo algo");



  return (

    <div className="page-content">
    <h1>Home</h1>
  </div>

  
    // <Router>
    //   <Route path="/interacciones" component={Interacciones} />
    //   {/* otras rutas aquí */}
    // </Router>
  )
}

export default App
