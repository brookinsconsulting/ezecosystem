-- #eze issue: unique handler names require greater storage space to run at all whatsoever. so we increase the default locally
ALTER TABLE sqliimport_item MODIFY COLUMN handler VARCHAR(150);
