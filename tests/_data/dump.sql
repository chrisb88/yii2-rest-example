--
-- File generated with SQLiteStudio v3.1.1 on Mi Mai 2 21:15:07 2018
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: categories
DROP TABLE IF EXISTS categories;
CREATE TABLE categories (id CHAR (36) PRIMARY KEY NOT NULL UNIQUE, name STRING (255) NOT NULL, slug STRING (80) UNIQUE NOT NULL, parentCategory CHAR (36), isVisible BOOLEAN DEFAULT (1) NOT NULL);
INSERT INTO categories (id, name, slug, parentCategory, isVisible) VALUES ('560f1a36-f580-11e7-b73d-d43d7e54900e', 'Category 1', 'cat1', NULL, 1);
INSERT INTO categories (id, name, slug, parentCategory, isVisible) VALUES ('68cab932-10ee-46d0-b8f7-f1e2ccf445cb', 'Category 2', 'cat2', NULL, 1);
INSERT INTO categories (id, name, slug, parentCategory, isVisible) VALUES ('25a3536f-611b-400d-a470-6b3d2489eb8b', 'Category 3', 'cat3', NULL, 1);
INSERT INTO categories (id, name, slug, parentCategory, isVisible) VALUES ('66fc7de6-2c19-4984-939d-51e646d4f567', 'Sub category 3a', 'sub3a', '25a3536f-611b-400d-a470-6b3d2489eb8b', 1);
INSERT INTO categories (id, name, slug, parentCategory, isVisible) VALUES ('f56a73e9-a4cc-4bba-ba7a-922d3d4f0c02', 'Sub category 3b', 'sub3b', '25a3536f-611b-400d-a470-6b3d2489eb8b', 1);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
