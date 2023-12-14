import React from "react";
import "./Styles/DogCard.css";

function DogCard({ perro }) {
	return (
		<div className="dog-card">
			<div className="dog-card-image">
				<img src={perro.url_foto} alt={`Foto de ${perro.nombre}`} />
			</div>
			<h3>{perro.nombre}</h3>
			<p>{perro.descripcion}</p>
		</div>
	);
}

export default DogCard;
