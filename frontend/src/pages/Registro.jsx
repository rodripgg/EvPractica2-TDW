import React, { useState, useEffect } from "react";
import axios from "axios";
import "./Styles/Registro.css";

const apiUrl = import.meta.env.VITE_API_URL;

function Registro() {
	const [dog, setDog] = useState({
		nombre: "",
		descripcion: "",
		url_foto: "",
	});

	const handleChange = (e) => {
		setDog({ ...dog, [e.target.name]: e.target.value });
	};

	const handleSubmit = (e) => {
		e.preventDefault();
		// Aquí puedes hacer una solicitud POST a tu API para registrar al perro
		axios
			.post(`${apiUrl}/perrosCreate`, dog)
			.then((response) => {
				console.log(response.data);
				console.log(dog);
			})
			.catch((error) => {
				console.error("Error:", error);
				console.error("Error de Axios:", error);
				console.log("Detalles del error:", error.response.data);
				console.log("Código de estado HTTP:", error.response.status);
			});
	};

	const getRandomDogImage = () => {
		axios
			.get("https://dog.ceo/api/breeds/image/random")
			.then((response) => {
				const url = response.data.message;
				//peticion axios para obtener la imagen
				axios
					.get(response.data.message)
					.then(() => {
						setDog({ ...dog, url_foto: url });
					})
					.catch(() => {
						console.log("Error al obtener la imagen, buscando otra...");
						getRandomDogImage();
					});
			})
			.catch((error) => {
				console.error("Error:", error);
			});
	};

	// Llama a getRandomDogImage cuando el componente se monta
	useEffect(() => {
		getRandomDogImage();
	}, []);

	return (
		<div className="registro-container">
			<div className="form-container">
				<h1 className="titulo">Registro</h1>
				<form onSubmit={handleSubmit} className="registro-form">
					<label>
						Nombre:
						<input
							type="text"
							name="nombre"
							value={dog.nombre}
							onChange={handleChange}
						/>
					</label>
					<label>
						Descripción:
						<input
							type="text"
							name="descripcion"
							value={dog.descripcion}
							onChange={handleChange}
						/>
					</label>{" "}
					<div className="image-container">
						<img src={dog.url_foto} alt="Imagen del perro" />
					</div>
					<div className="buttons-container">
						<button type="button" onClick={getRandomDogImage}>
							Obtener otra imagen
						</button>
						<button type="submit">Registrar</button>
					</div>
				</form>{" "}
			</div>
		</div>
	);
}

export default Registro;
