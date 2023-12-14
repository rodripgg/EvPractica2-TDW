import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import RandomDogCard from "../components/RandomDogCard";
import ListarCandidatos from "./ListarCandidatos";
import "./Styles/Interaccion.css";

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
			if (response.status === 404) {
				console.log("No hay perros disponibles");
				return;
			} else {
				const data = await response.json();
				console.log("Respuesta del servidor:", data);
				setPerroRandom(data);
			}
		} catch (error) {
			console.error("Error al obtener perroRandom:", error);
		}
	};
	
	useEffect(() => {
		obtenerPerroRandom();
	}, []);



	return (
		<div className="interaccion-container">
			<h1 className="interaccion-title">Interacciones</h1>
			{perro && (
				<div className="perro-info">
					<p>{perro.nombre}</p>
				</div>
			)}

			<div className="dog-container">
				{perroRandom && (
					<div>
						<RandomDogCard
							perroSeleccionado={perro}
							perroRandom={perroRandom}
							obtenerPerroRandom={obtenerPerroRandom}
						/>
					</div>
				)}
			</div>
			<button className="obtener-perro-btn" onClick={obtenerPerroRandom}>
				Obtener Perro Random
			</button>
			<ListarCandidatos perroInteresadoId={perro.id} />
		</div>
	);
};

export default Interaccion;
