<?php

/**
 * 
 *
 * @version 1.105
 * @package entity
 */
class DeviceModel extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='DeviceModel';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='device';
	const SQL_INSERT='INSERT INTO `device` (`device_id`,`area_id`,`plan_id`,`code`,`description`,`icon64x64_url_ok`,`icon64x64_url_ko`,`image_url`,`status`,`locationX`,`locationY`) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `device` (`area_id`,`plan_id`,`code`,`description`,`icon64x64_url_ok`,`icon64x64_url_ko`,`image_url`,`status`,`locationX`,`locationY`) VALUES (?,?,?,?,?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `device` SET `device_id`=?,`area_id`=?,`plan_id`=?,`code`=?,`description`=?,`icon64x64_url_ok`=?,`icon64x64_url_ko`=?,`image_url`=?,`status`=?,`locationX`=?,`locationY`=? WHERE `device_id`=?';
	const SQL_SELECT_PK='SELECT * FROM `device` WHERE `device_id`=?';
	const SQL_DELETE_PK='DELETE FROM `device` WHERE `device_id`=?';
	const FIELD_DEVICE_ID=522496524;
	const FIELD_AREA_ID=1734488693;
	const FIELD_PLAN_ID=1987060313;
	const FIELD_CODE=-1588638075;
	const FIELD_DESCRIPTION=-573339548;
	const FIELD_ICON64X64_URL_OK=1396214436;
	const FIELD_ICON64X64_URL_KO=1396214316;
	const FIELD_IMAGE_URL=-380537101;
	const FIELD_STATUS=-1505187190;
	const FIELD_LOCATIONX=-699902549;
	const FIELD_LOCATIONY=-699902548;
	private static $PRIMARY_KEYS=array(self::FIELD_DEVICE_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_DEVICE_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_DEVICE_ID=>'device_id',
		self::FIELD_AREA_ID=>'area_id',
		self::FIELD_PLAN_ID=>'plan_id',
		self::FIELD_CODE=>'code',
		self::FIELD_DESCRIPTION=>'description',
		self::FIELD_ICON64X64_URL_OK=>'icon64x64_url_ok',
		self::FIELD_ICON64X64_URL_KO=>'icon64x64_url_ko',
		self::FIELD_IMAGE_URL=>'image_url',
		self::FIELD_STATUS=>'status',
		self::FIELD_LOCATIONX=>'locationX',
		self::FIELD_LOCATIONY=>'locationY');
	private static $PROPERTY_NAMES=array(
		self::FIELD_DEVICE_ID=>'deviceId',
		self::FIELD_AREA_ID=>'areaId',
		self::FIELD_PLAN_ID=>'planId',
		self::FIELD_CODE=>'code',
		self::FIELD_DESCRIPTION=>'description',
		self::FIELD_ICON64X64_URL_OK=>'icon64x64UrlOk',
		self::FIELD_ICON64X64_URL_KO=>'icon64x64UrlKo',
		self::FIELD_IMAGE_URL=>'imageUrl',
		self::FIELD_STATUS=>'status',
		self::FIELD_LOCATIONX=>'locationX',
		self::FIELD_LOCATIONY=>'locationY');
	private static $PROPERTY_TYPES=array(
		self::FIELD_DEVICE_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_AREA_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_PLAN_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_CODE=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_DESCRIPTION=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ICON64X64_URL_OK=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_ICON64X64_URL_KO=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_IMAGE_URL=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_STATUS=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_LOCATIONX=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_LOCATIONY=>Db2PhpEntity::PHP_TYPE_INT);
	private static $FIELD_TYPES=array(
		self::FIELD_DEVICE_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_AREA_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_PLAN_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_CODE=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,200,0,false),
		self::FIELD_DESCRIPTION=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,2000,0,false),
		self::FIELD_ICON64X64_URL_OK=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,200,0,true),
		self::FIELD_ICON64X64_URL_KO=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,200,0,true),
		self::FIELD_IMAGE_URL=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,200,0,true),
		self::FIELD_STATUS=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,10,0,false),
		self::FIELD_LOCATIONX=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true),
		self::FIELD_LOCATIONY=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_DEVICE_ID=>null,
		self::FIELD_AREA_ID=>0,
		self::FIELD_PLAN_ID=>0,
		self::FIELD_CODE=>'',
		self::FIELD_DESCRIPTION=>'',
		self::FIELD_ICON64X64_URL_OK=>null,
		self::FIELD_ICON64X64_URL_KO=>null,
		self::FIELD_IMAGE_URL=>null,
		self::FIELD_STATUS=>'',
		self::FIELD_LOCATIONX=>null,
		self::FIELD_LOCATIONY=>null);
	private $deviceId;
	private $areaId;
	private $planId;
	private $code;
	private $description;
	private $icon64x64UrlOk;
	private $icon64x64UrlKo;
	private $imageUrl;
	private $status;
	private $locationX;
	private $locationY;

	/**
	 * set value for device_id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $deviceId
	 * @return DeviceModel
	 */
	public function &setDeviceId($deviceId) {
		$this->notifyChanged(self::FIELD_DEVICE_ID,$this->deviceId,$deviceId);
		$this->deviceId=$deviceId;
		return $this;
	}

	/**
	 * get value for device_id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @return mixed
	 */
	public function getDeviceId() {
		return $this->deviceId;
	}

	/**
	 * set value for area_id 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @param mixed $areaId
	 * @return DeviceModel
	 */
	public function &setAreaId($areaId) {
		$this->notifyChanged(self::FIELD_AREA_ID,$this->areaId,$areaId);
		$this->areaId=$areaId;
		return $this;
	}

	/**
	 * get value for area_id 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getAreaId() {
		return $this->areaId;
	}

	/**
	 * set value for plan_id 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @param mixed $planId
	 * @return DeviceModel
	 */
	public function &setPlanId($planId) {
		$this->notifyChanged(self::FIELD_PLAN_ID,$this->planId,$planId);
		$this->planId=$planId;
		return $this;
	}

	/**
	 * get value for plan_id 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getPlanId() {
		return $this->planId;
	}

	/**
	 * set value for code 
	 *
	 * type:VARCHAR,size:200,default:null
	 *
	 * @param mixed $code
	 * @return DeviceModel
	 */
	public function &setCode($code) {
		$this->notifyChanged(self::FIELD_CODE,$this->code,$code);
		$this->code=$code;
		return $this;
	}

	/**
	 * get value for code 
	 *
	 * type:VARCHAR,size:200,default:null
	 *
	 * @return mixed
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * set value for description 
	 *
	 * type:VARCHAR,size:2000,default:null
	 *
	 * @param mixed $description
	 * @return DeviceModel
	 */
	public function &setDescription($description) {
		$this->notifyChanged(self::FIELD_DESCRIPTION,$this->description,$description);
		$this->description=$description;
		return $this;
	}

	/**
	 * get value for description 
	 *
	 * type:VARCHAR,size:2000,default:null
	 *
	 * @return mixed
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * set value for icon64x64_url_ok 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @param mixed $icon64x64UrlOk
	 * @return DeviceModel
	 */
	public function &setIcon64x64UrlOk($icon64x64UrlOk) {
		$this->notifyChanged(self::FIELD_ICON64X64_URL_OK,$this->icon64x64UrlOk,$icon64x64UrlOk);
		$this->icon64x64UrlOk=$icon64x64UrlOk;
		return $this;
	}

	/**
	 * get value for icon64x64_url_ok 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getIcon64x64UrlOk() {
		return $this->icon64x64UrlOk;
	}

	/**
	 * set value for icon64x64_url_ko 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @param mixed $icon64x64UrlKo
	 * @return DeviceModel
	 */
	public function &setIcon64x64UrlKo($icon64x64UrlKo) {
		$this->notifyChanged(self::FIELD_ICON64X64_URL_KO,$this->icon64x64UrlKo,$icon64x64UrlKo);
		$this->icon64x64UrlKo=$icon64x64UrlKo;
		return $this;
	}

	/**
	 * get value for icon64x64_url_ko 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getIcon64x64UrlKo() {
		return $this->icon64x64UrlKo;
	}

	/**
	 * set value for image_url 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @param mixed $imageUrl
	 * @return DeviceModel
	 */
	public function &setImageUrl($imageUrl) {
		$this->notifyChanged(self::FIELD_IMAGE_URL,$this->imageUrl,$imageUrl);
		$this->imageUrl=$imageUrl;
		return $this;
	}

	/**
	 * get value for image_url 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getImageUrl() {
		return $this->imageUrl;
	}

	/**
	 * set value for status 
	 *
	 * type:VARCHAR,size:10,default:null
	 *
	 * @param mixed $status
	 * @return DeviceModel
	 */
	public function &setStatus($status) {
		$this->notifyChanged(self::FIELD_STATUS,$this->status,$status);
		$this->status=$status;
		return $this;
	}

	/**
	 * get value for status 
	 *
	 * type:VARCHAR,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * set value for locationX 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @param mixed $locationX
	 * @return DeviceModel
	 */
	public function &setLocationX($locationX) {
		$this->notifyChanged(self::FIELD_LOCATIONX,$this->locationX,$locationX);
		$this->locationX=$locationX;
		return $this;
	}

	/**
	 * get value for locationX 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getLocationX() {
		return $this->locationX;
	}

	/**
	 * set value for locationY 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @param mixed $locationY
	 * @return DeviceModel
	 */
	public function &setLocationY($locationY) {
		$this->notifyChanged(self::FIELD_LOCATIONY,$this->locationY,$locationY);
		$this->locationY=$locationY;
		return $this;
	}

	/**
	 * get value for locationY 
	 *
	 * type:INT,size:10,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getLocationY() {
		return $this->locationY;
	}

	/**
	 * Get table name
	 *
	 * @return string
	 */
	public static function getTableName() {
		return self::SQL_TABLE_NAME;
	}

	/**
	 * Get array with field id as index and field name as value
	 *
	 * @return array
	 */
	public static function getFieldNames() {
		return self::$FIELD_NAMES;
	}

	/**
	 * Get array with field id as index and property name as value
	 *
	 * @return array
	 */
	public static function getPropertyNames() {
		return self::$PROPERTY_NAMES;
	}

	/**
	 * get the field name for the passed field id.
	 *
	 * @param int $fieldId
	 * @param bool $fullyQualifiedName true if field name should be qualified by table name
	 * @return string field name for the passed field id, null if the field doesn't exist
	 */
	public static function getFieldNameByFieldId($fieldId, $fullyQualifiedName=true) {
		if (!array_key_exists($fieldId, self::$FIELD_NAMES)) {
			return null;
		}
		$fieldName=self::SQL_IDENTIFIER_QUOTE . self::$FIELD_NAMES[$fieldId] . self::SQL_IDENTIFIER_QUOTE;
		if ($fullyQualifiedName) {
			return self::SQL_IDENTIFIER_QUOTE . self::SQL_TABLE_NAME . self::SQL_IDENTIFIER_QUOTE . '.' . $fieldName;
		}
		return $fieldName;
	}

	/**
	 * Get array with field ids of identifiers
	 *
	 * @return array
	 */
	public static function getIdentifierFields() {
		return self::$PRIMARY_KEYS;
	}

	/**
	 * Get array with field ids of autoincrement fields
	 *
	 * @return array
	 */
	public static function getAutoincrementFields() {
		return self::$AUTOINCREMENT_FIELDS;
	}

	/**
	 * Get array with field id as index and property type as value
	 *
	 * @return array
	 */
	public static function getPropertyTypes() {
		return self::$PROPERTY_TYPES;
	}

	/**
	 * Get array with field id as index and field type as value
	 *
	 * @return array
	 */
	public static function getFieldTypes() {
		return self::$FIELD_TYPES;
	}

	/**
	 * Assign default values according to table
	 * 
	 */
	public function assignDefaultValues() {
		$this->assignByArray(self::$DEFAULT_VALUES);
	}


	/**
	 * return hash with the field name as index and the field value as value.
	 *
	 * @return array
	 */
	public function toHash() {
		$array=$this->toArray();
		$hash=array();
		foreach ($array as $fieldId=>$value) {
			$hash[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		return $hash;
	}

	/**
	 * return array with the field id as index and the field value as value.
	 *
	 * @return array
	 */
	public function toArray() {
		return array(
			self::FIELD_DEVICE_ID=>$this->getDeviceId(),
			self::FIELD_AREA_ID=>$this->getAreaId(),
			self::FIELD_PLAN_ID=>$this->getPlanId(),
			self::FIELD_CODE=>$this->getCode(),
			self::FIELD_DESCRIPTION=>$this->getDescription(),
			self::FIELD_ICON64X64_URL_OK=>$this->getIcon64x64UrlOk(),
			self::FIELD_ICON64X64_URL_KO=>$this->getIcon64x64UrlKo(),
			self::FIELD_IMAGE_URL=>$this->getImageUrl(),
			self::FIELD_STATUS=>$this->getStatus(),
			self::FIELD_LOCATIONX=>$this->getLocationX(),
			self::FIELD_LOCATIONY=>$this->getLocationY());
	}


	/**
	 * return array with the field id as index and the field value as value for the identifier fields.
	 *
	 * @return array
	 */
	public function getPrimaryKeyValues() {
		return array(
			self::FIELD_DEVICE_ID=>$this->getDeviceId());
	}

	/**
	 * cached statements
	 *
	 * @var array<string,array<string,PDOStatement>>
	 */
	private static $stmts=array();
	private static $cacheStatements=true;
	
	/**
	 * prepare passed string as statement or return cached if enabled and available
	 *
	 * @param PDO $db
	 * @param string $statement
	 * @return PDOStatement
	 */
	protected static function prepareStatement(PDO $db, $statement) {
		if(self::isCacheStatements()) {
			if (in_array($statement, array(self::SQL_INSERT, self::SQL_INSERT_AUTOINCREMENT, self::SQL_UPDATE, self::SQL_SELECT_PK, self::SQL_DELETE_PK))) {
				$dbInstanceId=spl_object_hash($db);
				if (null===self::$stmts[$statement][$dbInstanceId]) {
					self::$stmts[$statement][$dbInstanceId]=$db->prepare($statement);
				}
				return self::$stmts[$statement][$dbInstanceId];
			}
		}
		return $db->prepare($statement);
	}

	/**
	 * Enable statement cache
	 *
	 * @param bool $cache
	 */
	public static function setCacheStatements($cache) {
		self::$cacheStatements=true==$cache;
	}

	/**
	 * Check if statement cache is enabled
	 *
	 * @return bool
	 */
	public static function isCacheStatements() {
		return self::$cacheStatements;
	}

	/**
	 * Query by Example.
	 *
	 * Match by attributes of passed example instance and return matched rows as an array of DeviceModel instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param DeviceModel $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return DeviceModel[]
	 */
	public static function findByExample(PDO $db,DeviceModel $example, $and=true, $sort=null) {
		$exampleValues=$example->toArray();
		$filter=array();
		foreach ($exampleValues as $fieldId=>$value) {
			if (null!==$value) {
				$filter[$fieldId]=$value;
			}
		}
		return self::findByFilter($db, $filter, $and, $sort);
	}

	/**
	 * Query by filter.
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * Will return matched rows as an array of DeviceModel instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return DeviceModel[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `device`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of DeviceModel instances
	 *
	 * @param PDOStatement $stmt
	 * @return DeviceModel[]
	 */
	public static function fromStatement(PDOStatement $stmt) {
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		return self::fromExecutedStatement($stmt);
	}

	/**
	 * returns the result as an array of DeviceModel instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return DeviceModel[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new DeviceModel();
			$o->assignByHash($result);
			$o->notifyPristine();
			$resultInstances[]=$o;
		}
		$stmt->closeCursor();
		return $resultInstances;
	}

	/**
	 * Get sql WHERE part from filter.
	 *
	 * @param array $filter
	 * @param bool $and
	 * @param bool $fullyQualifiedNames true if field names should be qualified by table name
	 * @param bool $prependWhere true if WHERE should be prepended to conditions
	 * @return string
	 */
	public static function buildSqlWhere($filter, $and, $fullyQualifiedNames=true, $prependWhere=false) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		return $filter->buildSqlWhere(new self::$CLASS_NAME, $fullyQualifiedNames, $prependWhere);
	}

	/**
	 * get sql ORDER BY part from DSCs
	 *
	 * @param array $sort array of DSC instances
	 * @return string
	 */
	protected static function buildSqlOrderBy($sort) {
		return DSC::buildSqlOrderBy(new self::$CLASS_NAME, $sort);
	}

	/**
	 * bind values from filter to statement
	 *
	 * @param PDOStatement $stmt
	 * @param DFCInterface $filter
	 */
	public static function bindValuesForFilter(PDOStatement &$stmt, DFCInterface $filter) {
		$filter->bindValuesForFilter(new self::$CLASS_NAME, $stmt);
	}

	/**
	 * Execute select query and return matched rows as an array of DeviceModel instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return DeviceModel[]
	 */
	public static function findBySql(PDO $db, $sql) {
		$stmt=$db->query($sql);
		return self::fromExecutedStatement($stmt);
	}

	/**
	 * Delete rows matching the filter
	 *
	 * The filter can be either an hash with the field id as index and the value as filter value,
	 * or a array of DFC instances.
	 *
	 * @param PDO $db
	 * @param array $filter
	 * @param bool $and
	 * @return mixed
	 */
	public static function deleteByFilter(PDO $db, $filter, $and=true) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		if (0==count($filter)) {
			throw new InvalidArgumentException('refusing to delete without filter'); // just comment out this line if you are brave
		}
		$sql='DELETE FROM `device`'
		. self::buildSqlWhere($filter, $and, false, true);
		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}

	/**
	 * Assign values from array with the field id as index and the value as value
	 *
	 * @param array $array
	 */
	public function assignByArray($array) {
		$result=array();
		foreach ($array as $fieldId=>$value) {
			$result[self::$FIELD_NAMES[$fieldId]]=$value;
		}
		$this->assignByHash($result);
	}

	/**
	 * Assign values from hash where the indexes match the tables field names
	 *
	 * @param array $result
	 */
	public function assignByHash($result) {
		$this->setDeviceId($result['device_id']);
		$this->setAreaId($result['area_id']);
		$this->setPlanId($result['plan_id']);
		$this->setCode($result['code']);
		$this->setDescription($result['description']);
		$this->setIcon64x64UrlOk($result['icon64x64_url_ok']);
		$this->setIcon64x64UrlKo($result['icon64x64_url_ko']);
		$this->setImageUrl($result['image_url']);
		$this->setStatus($result['status']);
		$this->setLocationX($result['locationX']);
		$this->setLocationY($result['locationY']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return DeviceModel
	 */
	public static function findById(PDO $db,$deviceId) {
		$stmt=self::prepareStatement($db,self::SQL_SELECT_PK);
		$stmt->bindValue(1,$deviceId);
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		if(!$result) {
			return null;
		}
		$o=new DeviceModel();
		$o->assignByHash($result);
		$o->notifyPristine();
		return $o;
	}

	/**
	 * Bind all values to statement
	 *
	 * @param PDOStatement $stmt
	 */
	protected function bindValues(PDOStatement &$stmt) {
		$stmt->bindValue(1,$this->getDeviceId());
		$stmt->bindValue(2,$this->getAreaId());
		$stmt->bindValue(3,$this->getPlanId());
		$stmt->bindValue(4,$this->getCode());
		$stmt->bindValue(5,$this->getDescription());
		$stmt->bindValue(6,$this->getIcon64x64UrlOk());
		$stmt->bindValue(7,$this->getIcon64x64UrlKo());
		$stmt->bindValue(8,$this->getImageUrl());
		$stmt->bindValue(9,$this->getStatus());
		$stmt->bindValue(10,$this->getLocationX());
		$stmt->bindValue(11,$this->getLocationY());
	}


	/**
	 * Insert this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function insertIntoDatabase(PDO $db) {
		if (null===$this->getDeviceId()) {
			$stmt=self::prepareStatement($db,self::SQL_INSERT_AUTOINCREMENT);
			$stmt->bindValue(1,$this->getAreaId());
			$stmt->bindValue(2,$this->getPlanId());
			$stmt->bindValue(3,$this->getCode());
			$stmt->bindValue(4,$this->getDescription());
			$stmt->bindValue(5,$this->getIcon64x64UrlOk());
			$stmt->bindValue(6,$this->getIcon64x64UrlKo());
			$stmt->bindValue(7,$this->getImageUrl());
			$stmt->bindValue(8,$this->getStatus());
			$stmt->bindValue(9,$this->getLocationX());
			$stmt->bindValue(10,$this->getLocationY());
		} else {
			$stmt=self::prepareStatement($db,self::SQL_INSERT);
			$this->bindValues($stmt);
		}
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$lastInsertId=$db->lastInsertId();
		if (false!==$lastInsertId) {
			$this->setDeviceId($lastInsertId);
		}
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Update this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function updateToDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_UPDATE);
		$this->bindValues($stmt);
		$stmt->bindValue(12,$this->getDeviceId());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		$this->notifyPristine();
		return $affected;
	}


	/**
	 * Delete this instance from the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function deleteFromDatabase(PDO $db) {
		$stmt=self::prepareStatement($db,self::SQL_DELETE_PK);
		$stmt->bindValue(1,$this->getDeviceId());
		$affected=$stmt->execute();
		if (false===$affected) {
			$stmt->closeCursor();
			throw new Exception($stmt->errorCode() . ':' . var_export($stmt->errorInfo(), true), 0);
		}
		$stmt->closeCursor();
		return $affected;
	}


	/**
	 * get element as DOM Document
	 *
	 * @return DOMDocument
	 */
	public function toDOM() {
		return self::hashToDomDocument($this->toHash(), 'DeviceModel');
	}

	/**
	 * get single DeviceModel instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return DeviceModel
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new DeviceModel();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of DeviceModel from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return DeviceModel[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('DeviceModel') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>