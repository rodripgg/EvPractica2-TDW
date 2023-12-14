import React, { useEffect, useState } from 'react';
import axios from 'axios';
const apiUrl = import.meta.env.VITE_API_URL;

const ListarCandidatos = ({ perroInteresadoId}) => {
    const [perrosAceptados, setPerrosAceptados] = useState([]);
    const [perrosRechazados, setPerrosRechazados] = useState([]);

    //const [perros, setPerros] = useState([]);

    useEffect(() => {
        axios.get(`${apiUrl}/interacciones/aceptados/${perroInteresadoId}`)
            .then(response => {
                const promises = response.data.map(item =>
                    axios.get(`${apiUrl}/perro/${item.perro_candidato_id}`)
                );
                return Promise.all(promises);
            })
            .then(perros => {
                setPerrosAceptados(perros.map(perro => perro.data));
            })
            .catch(error => {
                console.error(error);
            });

        axios.get(`${apiUrl}/interacciones/rechazados/${perroInteresadoId}`)
            .then(response => {
                const promises = response.data.map(item =>
                    axios.get(`${apiUrl}/perro/${item.perro_candidato_id}`)
                );
                return Promise.all(promises);
            })
            .then(perros => {
                setPerrosRechazados(perros.map(perro => perro.data));
            })
            .catch(error => {
                console.error(error);
            });
    }, [perroInteresadoId]);

    return (
        <div>
            <h3>Perros Aceptados</h3>
            <ul>
                {perrosAceptados.map(perro => (

                    <li key={perro.id}>
                        <p>ID: {perro.id}</p>
                        <p>Nombre: {perro.nombre}</p>
                    </li>

                ))}
            </ul>
            <h3>Perros Rechazados</h3>
            <ul>
                {perrosRechazados.map(perro => (
                    <li key={perro.id}>
                        <p>ID: {perro.id}</p>
                        <p>Nombre: {perro.nombre}</p>
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default ListarCandidatos;