import React, { useState, useEffect } from "react";
import axios from "axios";
const apiUrl = import.meta.env.VITE_API_URL;

function Registro() {
	const [dog, setDog] = useState({ nombre: "", descripcion: "", url_foto: "" });

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

	function getRandomDogImage() {
		axios
			.get("https://dog.ceo/api/breeds/image/random")
			.then((response) => {
				setDog({ ...dog, url_foto: response.data.message });
			})
			.catch((error) => {
				console.error("Error:", error);
			});
	}
	// Llama a getRandomDogImage cuando el componente se monta
	useEffect(() => {
		getRandomDogImage();
	}, []);


	return (
		<div>
			<h1>Registro</h1>
			<form onSubmit={handleSubmit}>
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
				</label>
				<label>
					Foto (URL):
					<input
						type="text"
						name="url_foto"
						value={dog.url_foto}
						onChange={handleChange}
					/>
				</label>
				<img src={dog.url_foto} alt="Imagen del perro" />
				<button type="button" onClick={getRandomDogImage}>
					Obtener otra imagen
				</button>

				<button type="submit">Registrar</button>
			</form>
		</div>
	);
}

export default Registro;
