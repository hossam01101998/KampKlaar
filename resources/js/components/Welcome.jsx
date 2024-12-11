import React from 'react';

function Welcome() {
    return (
        <div className="d-flex flex-column align-items-center justify-content-center vh-100">
            <img src="/path/to/your/logo.png" alt="Logo" className="mb-4" style={{ width: '150px', height: '150px' }} />
            <h1 className="mb-3">Welkom bij KampKlaar</h1>
            <p className="mb-4" style={{ fontSize: '18px' }}>Huur eenvoudig en snel je materiaal</p>
            <div className="d-flex flex-column">
                <button className="btn btn-primary mb-2">Inloggen als leiding</button>
                <button className="btn btn-primary">Inloggen als beheerder</button>
            </div>
        </div>
    );
}

export default Welcome;