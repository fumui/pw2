CREATE TABLE users (
	id VARCHAR(36) NOT NULL PRIMARY KEY,
	username VARCHAR(18) NOT NULL,
	password VARCHAR(80) NOT NULL,
	email VARCHAR(50) NOT NULL,
	level ENUM('USER', 'ADMIN') NOT NULL,
	created_by VARCHAR(36) NOT NULL,
	created_at timestamp NOT NULL DEFAULT current_timestamp,
	updated_by VARCHAR(36) NOT NULL,
	updated_at timestamp NOT NULL DEFAULT current_timestamp,
	deleted bool NOT NULL
)

CREATE TABLE categories (
	id VARCHAR(36) NOT NULL PRIMARY KEY,
	name TEXT NOT NULL,
	created_by VARCHAR(36) NOT NULL,
	created_at timestamp NOT NULL DEFAULT current_timestamp,
	updated_by VARCHAR(36) NOT NULL,
	updated_at timestamp NOT NULL DEFAULT current_timestamp,
	deleted bool NOT NULL
)

CREATE TABLE books (
	id VARCHAR(36) NOT NULL PRIMARY KEY,
	category_id VARCHAR(36) NOT NULL,
	title TEXT NOT NULL,
	author VARCHAR(80) NOT NULL,
	release_date DATE NOT NULL,
	summary TEXT NOT NULL,
	download_link TEXT NOT NULL,
	size INT NOT NULL,
	created_by VARCHAR(36) NOT NULL,
	created_at timestamp NOT NULL DEFAULT current_timestamp,
	updated_by VARCHAR(36) NOT NULL,
	updated_at timestamp NOT NULL DEFAULT current_timestamp,
	deleted bool NOT NULL 
)

CREATE TABLE reviews (
	id VARCHAR(36) NOT NULL PRIMARY KEY,
	book_id VARCHAR(36) NOT NULL,
	user_id VARCHAR(36) NOT NULL,
	rating INT NOT NULL,
	comment TEXT NOT NULL,
	created_by VARCHAR(36) NOT NULL,
	created_at timestamp NOT NULL DEFAULT current_timestamp,
	updated_by VARCHAR(36) NOT NULL,
	updated_at timestamp NOT NULL DEFAULT current_timestamp,
	deleted bool NOT NULL
)


CREATE TABLE downloads (
	id VARCHAR(36) NOT NULL PRIMARY KEY,
	book_id VARCHAR(36) NOT NULL,
	user_id VARCHAR(36) NOT NULL,
	created_by VARCHAR(36) NOT NULL,
	created_at timestamp NOT NULL DEFAULT current_timestamp,
	updated_by VARCHAR(36) NOT NULL,
	updated_at timestamp NOT NULL DEFAULT current_timestamp,
	deleted bool NOT NULL
)