-- remove duplikat
select * from makan;


-- standarization
select item_name,trim(item_name) from makan;
update makan set  item_name  = trim(item_name) ;
select * from superstore;
ALTER TABLE superstore MODIFY COLUMN OrderDate DATE;

select ShipDate from superstore2;

ALTER TABLE `umkm`.`superstore` CHANGE COLUMN `ShipDate` `ShipDate` DATE NULL DEFAULT NULL ;
UPDATE `umkm`.`superstore`
SET `ShipDate` = STR_TO_DATE(`ShipDate`, '%m/%d/%Y')
WHERE `ShipDate` IS NOT NULL;

#1.Remove Duplikat
WITH duplikat AS (
    SELECT *,
           ROW_NUMBER() OVER (
               PARTITION BY order_id, "date", item_name, item_type, item_price,
               quantity, transaction_amount, transaction_type, received_by, time_of_sale
           ) AS row_num
    FROM makan
    
)
select * from duplikat where row_num >1;
DELETE FROM table_name
WHERE id IN (SELECT id FROM CTE WHERE rn > 1);


#2.Standarisasi data
UPDATE table_name
SET column_name = UPPER(TRIM(column_name));

UPDATE table_name
SET date_column = STR_TO_DATE(date_column, '%m/%d/%Y');

UPDATE table_name
SET column_name = COALESCE(column_name, 'Default Value');

SELECT *
FROM table_name
WHERE column_name IS NULL;


#3.Null value or missing value
#4.remove value kolom yang tidak dibutuhkan
ALTER TABLE table_name
DROP COLUMN column_name;


