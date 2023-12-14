import React from "react";
//import axios from "axios";
import "./Styles/DogCard.css";

const apiUrl = import.meta.env.VITE_API_URL;

function RandomDogCard({ perroSeleccionado, perroRandom }) {

    const perroSeleccionadoId = perroSeleccionado.id;
    const perroRandomId = perroRandom.id;

    console.log(perroSeleccionadoId);
    console.log(perroRandomId);

    const like = () => {

        const tipoInteraccion = "aceptado";

        // Datos a enviar en el cuerpo de la solicitud POST
        const data = {
            perro_interesado_id: perroSeleccionadoId,
            perro_candidato_id: perroRandomId,
            preferencia: tipoInteraccion,
        };
        console.log(data);
    }

    const dislike = () => {
        console.log("Dislike");
    }

    return (
        <div className="dog-card">
            <div className="dog-card-image">
                <img src={perroRandom.url_foto} alt={`Foto de ${perroRandom.nombre}`} />
            </div>
            <h3>{perroRandom.nombre}</h3>
            <p>{perroRandom.id}</p>
            <p>{perroRandom.descripcion}</p>
            <button onClick={like()}>Like</button>
        </div>
    );
}

export default RandomDogCard;
