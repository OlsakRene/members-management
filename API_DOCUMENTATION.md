// API Documentation (store in: API_DOCUMENTATION.md)

/**
 * # API Documentation
 * 
 * ## Endpoints
 * 
 * ## DASHBOARD
 * - `GET /`
 * - Response: Dashboard.
 * 
 * ## MEMBERS
 * 
 * ### Get All Members
 * - `GET /members`
 * - Response: List of members with tags.
 * 
 * ### Create Member
 * - `POST /members`
 * - Required Body:
 *   - `first_name`: string
 *   - `last_name`: string
 *   - `email`: string (unique)
 *   - `birth_date`: date
 *   - `tags`: array of tag IDs (optional)
 * - Response: Created member object.
 * 
 * ### Update Member
 * - `PUT /members/{id}`
 * - Optional Body Fields:
 *   - `first_name`: string
 *   - `last_name`: string
 *   - `email`: string (unique)
 *   - `birth_date`: date
 *   - `tags`: array of tag IDs (optional)
 * - Response: Updated member object.
 * 
 * ### Delete Member
 * - `DELETE /members/{id}`
 * - Response: 204 No Content.
 * 
 * ## TAGS
 * 
 * ### Get All Tags
 * - `GET /tags`
 * - Response: List of tags.
 * 
 * ### Create Tag
 * - `POST /tags`
 * - Required Body:
 *   - `name`: string
 * - Response: Created tag object.
 * 
 * ### Update Tag
 * - `PUT /tags/{id}`
 * - Body Fields:
 *   - `name`: string
 * - Response: Updated tag object.
 * 
 * ### Delete Tag
 * - `DELETE /tags/{id}`
 * - Response: 204 No Content.
 * 
 * ## ERROR HANDLING
 * 
 * ### Possible Errors
 * - `400` Bad Request: Invalid input or missing fields.
 * - `404` Not Found: Resource not found.
 * - `409` Conflict: Duplicate resource (e.g., email or tag name).
 */