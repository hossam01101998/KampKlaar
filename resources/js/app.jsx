import React from 'react';
import ReactDOM from 'react-dom';
import Welcome from './components/Welcome';

if (document.getElementById('app')) {
    ReactDOM.render(<Welcome />, document.getElementById('app'));
}