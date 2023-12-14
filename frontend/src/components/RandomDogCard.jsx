import React from "react";
import axios from "axios";
import "./Styles/RandomDogCard.css";


const apiUrl = import.meta.env.VITE_API_URL;

function RandomDogCard({ perroSeleccionado, perroRandom, obtenerPerroRandom }) {
	// defino interaccion

	const perroSeleccionadoId = perroSeleccionado.id;
	const perroRandomId = perroRandom.id;

	const like = () => {
		const tipoInteraccion = "aceptado";
		// Datos a enviar en el cuerpo de la solicitud POST
		const data = {
			perro_interesado_id: perroSeleccionadoId,
			perro_candidato_id: perroRandomId,
			preferencia: tipoInteraccion,
		};
		crearInteraccion(data);
	};

	const dislike = () => {
		const tipoInteraccion = "rechazado";
		// Datos a enviar en el cuerpo de la solicitud POST
		const data = {
			perro_interesado_id: perroSeleccionadoId,
			perro_candidato_id: perroRandomId,
			preferencia: tipoInteraccion,
		};
		crearInteraccion(data);
	};

	const crearInteraccion = (data) => {
		// Realizar la petición POST a la API
		axios
			.post(`${apiUrl}/interaccionesCreate`, data)
			.then((response) => {
				// Manejar la respuesta de la API, si es necesario
				console.log("Interacción creada con éxito:", response.data);
				revisarMatch();
				obtenerNuevoPerroRandom();
			})
			.catch((error) => {
				// Manejar errores en la petición
				console.error("Error al crear la interacción:", error);
			});
	};

	const revisarMatch = async () => {
		try {
			const response = await axios.get(
				`${apiUrl}/match/${perroSeleccionadoId}/${perroRandomId}`
			);
			const data = response.data;

			if (data.message === "match") {
				console.log("Match encontrado:", data);
			} else {
				console.log("No hay match");
			}
		} catch (error) {
			// Manejar errores
			console.error("Error al revisar el match:", error.message);
		}
	};

	const obtenerNuevoPerroRandom = () => {
		obtenerPerroRandom();
	};

	return (
		<div className="random-dog-card">
			<div className="random-image-container">
				<img src={perroRandom.url_foto} alt={`Foto de ${perroRandom.nombre}`} />
			</div>
			<h3 className="nombre">{perroRandom.nombre}</h3>
			<p>{perroRandom.descripcion}</p>
			<button onClick={like}>Like</button>
			<button onClick={dislike}>Dislike</button>
		</div>
	);
}

export default RandomDogCard;
