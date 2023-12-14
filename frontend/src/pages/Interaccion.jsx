import React, { useState, useEffect } from "react";

// En el componente Interacciones
import { useLocation } from "react-router-dom";
import RandomDogCard from "../components/RandomDogCard";

const apiUrl = import.meta.env.VITE_API_URL;

const Interaccion = () => {
	const location = useLocation();
	const perro = location.state && location.state.perro;
	const [perroRandom, setPerroRandom] = useState(null);

	const obtenerPerroRandom = async () => {
		try {
			const response = await fetch(
				`${apiUrl}/interacciones/random/${perro.id}`
			);
			// si la respuesta es 404, no hay perros disponibles
			if (response.status === 404) {
				console.log("No hay perros disponibles");
				return;
			} else {
				// revisa si ya existe una interaccion entre el perro seleccionado y el perro random
				const data = await response.json();
				console.log("Respuesta del servidor:", data);
				setPerroRandom(data);
			}
		} catch (error) {
			console.error("Error al obtener perroRandom:", error);
		}
	};

	return (
		<div>
			<h1>Interacciones</h1>
			{perro && (
				<div>
					<p> {perro.nombre}</p>
				</div>
			)}
			<button onClick={obtenerPerroRandom}>Obtener Perro Random</button>
			<div className="dog-container">
				{perroRandom && (
					<div>
						<RandomDogCard
							perroSeleccionado={perro}
							perroRandom={perroRandom}
						/>
					</div>
				)}
			</div>
		</div>
	);
};

export default Interaccion;
