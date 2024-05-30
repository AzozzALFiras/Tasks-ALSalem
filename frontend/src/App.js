import React, { useState } from 'react';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';

function App() {
    // State to manage form data
  const [formData, setFormData] = useState({
    first_name: '',
    last_name: '',
    email: '',
    phone_number: '',
    short_introduction: '',
    age: '',
    city: '',
    field_of_study: '',
    degree: 'High School',
    years_of_experience: '',
    photo: null,
    resume: null,
  });

    // State for modal visibility and message
  const [modalVisible, setModalVisible] = useState(false);
  const [modalMessage, setModalMessage] = useState('');
  const [modalType, setModalType] = useState(''); // 'success' or 'danger'

    // State for validation errors
  const [validationErrors, setValidationErrors] = useState({});

    // Handle change for input fields
  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

    // Handle change for file input fields
  const handleFileChange = (e) => {
    const { name, files } = e.target;
    setFormData({
      ...formData,
      [name]: files[0],
    });
  };

    // Validate the form data
  const validateForm = () => {
    const errors = {};
    for (const key in formData) {
      if (!formData[key] && key !== 'photo' && key !== 'resume') {
        errors[key] = 'This field is required';
      }
    }
    setValidationErrors(errors);
    return Object.keys(errors).length === 0;
  };

    // Handle form submission
  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!validateForm()) {
      return;
    }

    const data = new FormData();
    for (const key in formData) {
      data.append(key, formData[key]);
    }
    // Basie API URL and token
    const token = process.env.REACT_APP_TOKEN;
    const baseApi = process.env.REACT_APP_API_URL;

    try {
      const response = await axios.post(`${baseApi}/recruitment-forms`, data, {
        headers: {
          'Content-Type': 'multipart/form-data',
          'Authorization': `Bearer ${token}`, 
        },
      });
      // Show modal based on the response
      if (response.data.status === 'success') {
        setModalMessage('Form submitted successfully!');
        setModalType('success');
      } else {
        setModalMessage('An error occurred while submitting the form.');
        setModalType('danger');
      }
    } catch (error) {
      setModalMessage('An error occurred while submitting the form.');
      setModalType('danger');
    }
    setModalVisible(true);
  };

  return (
    <div className="container mt-5">
      <h1>Recruitment Form</h1>
      <form onSubmit={handleSubmit}>
        {['first_name', 'last_name', 'email', 'phone_number', 'short_introduction', 'age', 'city', 'field_of_study', 'years_of_experience'].map((field) => (
          <div className="mb-3" key={field}>
            <label htmlFor={field} className={`form-label ${validationErrors[field] ? 'text-danger' : ''}`}>
              {field.replace('_', ' ').charAt(0).toUpperCase() + field.replace('_', ' ').slice(1)}
            </label>
            <input
              type={field === 'age' || field === 'years_of_experience' ? 'number' : 'text'}
              className={`form-control ${validationErrors[field] ? 'is-invalid' : ''}`}
              id={field}
              name={field}
              value={formData[field]}
              onChange={handleChange}
              required
            />
            {validationErrors[field] && <div className="invalid-feedback">{validationErrors[field]}</div>}
          </div>
        ))}
        <div className="mb-3">
          <label htmlFor="degree" className="form-label">Degree</label>
          <select
            className="form-control"
            id="degree"
            name="degree"
            value={formData.degree}
            onChange={handleChange}
            required
          >
            <option value="High School">High School</option>
            <option value="Associate">Associate</option>
            <option value="Bachelor">Bachelor</option>
            <option value="Master">Master</option>
            <option value="Doctorate">Doctorate</option>
          </select>
        </div>
        <div className="mb-3">
          <label htmlFor="photo" className={`form-label ${validationErrors.photo ? 'text-danger' : ''}`}>Photo</label>
          <input
            type="file"
            className={`form-control ${validationErrors.photo ? 'is-invalid' : ''}`}
            id="photo"
            name="photo"
            accept="image/jpeg, image/png"
            onChange={handleFileChange}
            required
          />
          {validationErrors.photo && <div className="invalid-feedback">{validationErrors.photo}</div>}
        </div>
        <div className="mb-3">
          <label htmlFor="resume" className={`form-label ${validationErrors.resume ? 'text-danger' : ''}`}>Resume</label>
          <input
            type="file"
            className={`form-control ${validationErrors.resume ? 'is-invalid' : ''}`}
            id="resume"
            name="resume"
            accept="application/pdf"
            onChange={handleFileChange}
            required
          />
          {validationErrors.resume && <div className="invalid-feedback">{validationErrors.resume}</div>}
        </div>
        <button type="submit" className="btn btn-primary">Submit</button>
      </form>

      {/* Bootstrap Modal */}
      {modalVisible && (
        <div className="modal show d-block" tabIndex="-1" role="dialog">
          <div className="modal-dialog" role="document">
            <div className={`modal-content ${modalType === 'success' ? 'bg-success' : 'bg-danger'}`}>
              <div className="modal-header">
                <h5 className="modal-title">{modalType === 'success' ? 'Success' : 'Error'}</h5>
                <button type="button" className="btn-close" aria-label="Close" onClick={() => setModalVisible(false)}></button>
              </div>
              <div className="modal-body">
                <p>{modalMessage}</p>
              </div>
              <div className="modal-footer">
                <button type="button" className="btn btn-secondary" onClick={() => setModalVisible(false)}>Close</button>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}

export default App;
