<?php

/**
 * 
 *
 * @version 1.105
 * @package entity
 */
class FloorPlanModel extends Db2PhpEntityBase implements Db2PhpEntityModificationTracking {
	private static $CLASS_NAME='FloorPlanModel';
	const SQL_IDENTIFIER_QUOTE='`';
	const SQL_TABLE_NAME='floor_plan';
	const SQL_INSERT='INSERT INTO `floor_plan` (`plan_id`,`title`,`description`,`width`,`height`,`coordN`,`coordE`,`plan_url`,`svg_url`) VALUES (?,?,?,?,?,?,?,?,?)';
	const SQL_INSERT_AUTOINCREMENT='INSERT INTO `floor_plan` (`title`,`description`,`width`,`height`,`coordN`,`coordE`,`plan_url`,`svg_url`) VALUES (?,?,?,?,?,?,?,?)';
	const SQL_UPDATE='UPDATE `floor_plan` SET `plan_id`=?,`title`=?,`description`=?,`width`=?,`height`=?,`coordN`=?,`coordE`=?,`plan_url`=?,`svg_url`=? WHERE `plan_id`=?';
	const SQL_SELECT_PK='SELECT * FROM `floor_plan` WHERE `plan_id`=?';
	const SQL_DELETE_PK='DELETE FROM `floor_plan` WHERE `plan_id`=?';
	const FIELD_PLAN_ID=906249599;
	const FIELD_TITLE=-1443477146;
	const FIELD_DESCRIPTION=-1565153142;
	const FIELD_WIDTH=-1440721708;
	const FIELD_HEIGHT=-2145694759;
	const FIELD_COORDN=2015551147;
	const FIELD_COORDE=2015551138;
	const FIELD_PLAN_URL=-1971021429;
	const FIELD_SVG_URL=-434799454;
	private static $PRIMARY_KEYS=array(self::FIELD_PLAN_ID);
	private static $AUTOINCREMENT_FIELDS=array(self::FIELD_PLAN_ID);
	private static $FIELD_NAMES=array(
		self::FIELD_PLAN_ID=>'plan_id',
		self::FIELD_TITLE=>'title',
		self::FIELD_DESCRIPTION=>'description',
		self::FIELD_WIDTH=>'width',
		self::FIELD_HEIGHT=>'height',
		self::FIELD_COORDN=>'coordN',
		self::FIELD_COORDE=>'coordE',
		self::FIELD_PLAN_URL=>'plan_url',
		self::FIELD_SVG_URL=>'svg_url');
	private static $PROPERTY_NAMES=array(
		self::FIELD_PLAN_ID=>'planId',
		self::FIELD_TITLE=>'title',
		self::FIELD_DESCRIPTION=>'description',
		self::FIELD_WIDTH=>'width',
		self::FIELD_HEIGHT=>'height',
		self::FIELD_COORDN=>'coordN',
		self::FIELD_COORDE=>'coordE',
		self::FIELD_PLAN_URL=>'planUrl',
		self::FIELD_SVG_URL=>'svgUrl');
	private static $PROPERTY_TYPES=array(
		self::FIELD_PLAN_ID=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_TITLE=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_DESCRIPTION=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_WIDTH=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_HEIGHT=>Db2PhpEntity::PHP_TYPE_INT,
		self::FIELD_COORDN=>Db2PhpEntity::PHP_TYPE_FLOAT,
		self::FIELD_COORDE=>Db2PhpEntity::PHP_TYPE_FLOAT,
		self::FIELD_PLAN_URL=>Db2PhpEntity::PHP_TYPE_STRING,
		self::FIELD_SVG_URL=>Db2PhpEntity::PHP_TYPE_STRING);
	private static $FIELD_TYPES=array(
		self::FIELD_PLAN_ID=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_TITLE=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,200,0,false),
		self::FIELD_DESCRIPTION=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,2000,0,false),
		self::FIELD_WIDTH=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_HEIGHT=>array(Db2PhpEntity::JDBC_TYPE_INTEGER,10,0,false),
		self::FIELD_COORDN=>array(Db2PhpEntity::JDBC_TYPE_DOUBLE,22,0,true),
		self::FIELD_COORDE=>array(Db2PhpEntity::JDBC_TYPE_DOUBLE,22,0,true),
		self::FIELD_PLAN_URL=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,200,0,true),
		self::FIELD_SVG_URL=>array(Db2PhpEntity::JDBC_TYPE_VARCHAR,200,0,true));
	private static $DEFAULT_VALUES=array(
		self::FIELD_PLAN_ID=>null,
		self::FIELD_TITLE=>'',
		self::FIELD_DESCRIPTION=>'',
		self::FIELD_WIDTH=>0,
		self::FIELD_HEIGHT=>0,
		self::FIELD_COORDN=>null,
		self::FIELD_COORDE=>null,
		self::FIELD_PLAN_URL=>null,
		self::FIELD_SVG_URL=>null);
	private $planId;
	private $title;
	private $description;
	private $width;
	private $height;
	private $coordN;
	private $coordE;
	private $planUrl;
	private $svgUrl;

	/**
	 * set value for plan_id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @param mixed $planId
	 * @return FloorPlanModel
	 */
	public function &setPlanId($planId) {
		$this->notifyChanged(self::FIELD_PLAN_ID,$this->planId,$planId);
		$this->planId=$planId;
		return $this;
	}

	/**
	 * get value for plan_id 
	 *
	 * type:INT,size:10,default:null,primary,unique,autoincrement
	 *
	 * @return mixed
	 */
	public function getPlanId() {
		return $this->planId;
	}

	/**
	 * set value for title 
	 *
	 * type:VARCHAR,size:200,default:null
	 *
	 * @param mixed $title
	 * @return FloorPlanModel
	 */
	public function &setTitle($title) {
		$this->notifyChanged(self::FIELD_TITLE,$this->title,$title);
		$this->title=$title;
		return $this;
	}

	/**
	 * get value for title 
	 *
	 * type:VARCHAR,size:200,default:null
	 *
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * set value for description 
	 *
	 * type:VARCHAR,size:2000,default:null
	 *
	 * @param mixed $description
	 * @return FloorPlanModel
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
	 * set value for width 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @param mixed $width
	 * @return FloorPlanModel
	 */
	public function &setWidth($width) {
		$this->notifyChanged(self::FIELD_WIDTH,$this->width,$width);
		$this->width=$width;
		return $this;
	}

	/**
	 * get value for width 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * set value for height 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @param mixed $height
	 * @return FloorPlanModel
	 */
	public function &setHeight($height) {
		$this->notifyChanged(self::FIELD_HEIGHT,$this->height,$height);
		$this->height=$height;
		return $this;
	}

	/**
	 * get value for height 
	 *
	 * type:INT,size:10,default:null
	 *
	 * @return mixed
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * set value for coordN 
	 *
	 * type:DOUBLE,size:22,default:null,nullable
	 *
	 * @param mixed $coordN
	 * @return FloorPlanModel
	 */
	public function &setCoordN($coordN) {
		$this->notifyChanged(self::FIELD_COORDN,$this->coordN,$coordN);
		$this->coordN=$coordN;
		return $this;
	}

	/**
	 * get value for coordN 
	 *
	 * type:DOUBLE,size:22,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getCoordN() {
		return $this->coordN;
	}

	/**
	 * set value for coordE 
	 *
	 * type:DOUBLE,size:22,default:null,nullable
	 *
	 * @param mixed $coordE
	 * @return FloorPlanModel
	 */
	public function &setCoordE($coordE) {
		$this->notifyChanged(self::FIELD_COORDE,$this->coordE,$coordE);
		$this->coordE=$coordE;
		return $this;
	}

	/**
	 * get value for coordE 
	 *
	 * type:DOUBLE,size:22,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getCoordE() {
		return $this->coordE;
	}

	/**
	 * set value for plan_url 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @param mixed $planUrl
	 * @return FloorPlanModel
	 */
	public function &setPlanUrl($planUrl) {
		$this->notifyChanged(self::FIELD_PLAN_URL,$this->planUrl,$planUrl);
		$this->planUrl=$planUrl;
		return $this;
	}

	/**
	 * get value for plan_url 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getPlanUrl() {
		return $this->planUrl;
	}

	/**
	 * set value for svg_url 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @param mixed $svgUrl
	 * @return FloorPlanModel
	 */
	public function &setSvgUrl($svgUrl) {
		$this->notifyChanged(self::FIELD_SVG_URL,$this->svgUrl,$svgUrl);
		$this->svgUrl=$svgUrl;
		return $this;
	}

	/**
	 * get value for svg_url 
	 *
	 * type:VARCHAR,size:200,default:null,nullable
	 *
	 * @return mixed
	 */
	public function getSvgUrl() {
		return $this->svgUrl;
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
			self::FIELD_PLAN_ID=>$this->getPlanId(),
			self::FIELD_TITLE=>$this->getTitle(),
			self::FIELD_DESCRIPTION=>$this->getDescription(),
			self::FIELD_WIDTH=>$this->getWidth(),
			self::FIELD_HEIGHT=>$this->getHeight(),
			self::FIELD_COORDN=>$this->getCoordN(),
			self::FIELD_COORDE=>$this->getCoordE(),
			self::FIELD_PLAN_URL=>$this->getPlanUrl(),
			self::FIELD_SVG_URL=>$this->getSvgUrl());
	}


	/**
	 * return array with the field id as index and the field value as value for the identifier fields.
	 *
	 * @return array
	 */
	public function getPrimaryKeyValues() {
		return array(
			self::FIELD_PLAN_ID=>$this->getPlanId());
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
	 * Match by attributes of passed example instance and return matched rows as an array of FloorPlanModel instances
	 *
	 * @param PDO $db a PDO Database instance
	 * @param FloorPlanModel $example an example instance defining the conditions. All non-null properties will be considered a constraint, null values will be ignored.
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return FloorPlanModel[]
	 */
	public static function findByExample(PDO $db,FloorPlanModel $example, $and=true, $sort=null) {
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
	 * Will return matched rows as an array of FloorPlanModel instances.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param array $filter array of DFC instances defining the conditions
	 * @param boolean $and true if conditions should be and'ed, false if they should be or'ed
	 * @param array $sort array of DSC instances
	 * @return FloorPlanModel[]
	 */
	public static function findByFilter(PDO $db, $filter, $and=true, $sort=null) {
		if (!($filter instanceof DFCInterface)) {
			$filter=new DFCAggregate($filter, $and);
		}
		$sql='SELECT * FROM `floor_plan`'
		. self::buildSqlWhere($filter, $and, false, true)
		. self::buildSqlOrderBy($sort);

		$stmt=self::prepareStatement($db, $sql);
		self::bindValuesForFilter($stmt, $filter);
		return self::fromStatement($stmt);
	}

	/**
	 * Will execute the passed statement and return the result as an array of FloorPlanModel instances
	 *
	 * @param PDOStatement $stmt
	 * @return FloorPlanModel[]
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
	 * returns the result as an array of FloorPlanModel instances without executing the passed statement
	 *
	 * @param PDOStatement $stmt
	 * @return FloorPlanModel[]
	 */
	public static function fromExecutedStatement(PDOStatement $stmt) {
		$resultInstances=array();
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)) {
			$o=new FloorPlanModel();
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
	 * Execute select query and return matched rows as an array of FloorPlanModel instances.
	 *
	 * The query should of course be on the table for this entity class and return all fields.
	 *
	 * @param PDO $db a PDO Database instance
	 * @param string $sql
	 * @return FloorPlanModel[]
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
		$sql='DELETE FROM `floor_plan`'
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
		$this->setPlanId($result['plan_id']);
		$this->setTitle($result['title']);
		$this->setDescription($result['description']);
		$this->setWidth($result['width']);
		$this->setHeight($result['height']);
		$this->setCoordN($result['coordN']);
		$this->setCoordE($result['coordE']);
		$this->setPlanUrl($result['plan_url']);
		$this->setSvgUrl($result['svg_url']);
	}

	/**
	 * Get element instance by it's primary key(s).
	 * Will return null if no row was matched.
	 *
	 * @param PDO $db
	 * @return FloorPlanModel
	 */
	public static function findById(PDO $db,$planId) {
		$stmt=self::prepareStatement($db,self::SQL_SELECT_PK);
		$stmt->bindValue(1,$planId);
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
		$o=new FloorPlanModel();
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
		$stmt->bindValue(1,$this->getPlanId());
		$stmt->bindValue(2,$this->getTitle());
		$stmt->bindValue(3,$this->getDescription());
		$stmt->bindValue(4,$this->getWidth());
		$stmt->bindValue(5,$this->getHeight());
		$stmt->bindValue(6,$this->getCoordN());
		$stmt->bindValue(7,$this->getCoordE());
		$stmt->bindValue(8,$this->getPlanUrl());
		$stmt->bindValue(9,$this->getSvgUrl());
	}


	/**
	 * Insert this instance into the database
	 *
	 * @param PDO $db
	 * @return mixed
	 */
	public function insertIntoDatabase(PDO $db) {
		if (null===$this->getPlanId()) {
			$stmt=self::prepareStatement($db,self::SQL_INSERT_AUTOINCREMENT);
			$stmt->bindValue(1,$this->getTitle());
			$stmt->bindValue(2,$this->getDescription());
			$stmt->bindValue(3,$this->getWidth());
			$stmt->bindValue(4,$this->getHeight());
			$stmt->bindValue(5,$this->getCoordN());
			$stmt->bindValue(6,$this->getCoordE());
			$stmt->bindValue(7,$this->getPlanUrl());
			$stmt->bindValue(8,$this->getSvgUrl());
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
			$this->setPlanId($lastInsertId);
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
		$stmt->bindValue(10,$this->getPlanId());
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
		$stmt->bindValue(1,$this->getPlanId());
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
		return self::hashToDomDocument($this->toHash(), 'FloorPlanModel');
	}

	/**
	 * get single FloorPlanModel instance from a DOMElement
	 *
	 * @param DOMElement $node
	 * @return FloorPlanModel
	 */
	public static function fromDOMElement(DOMElement $node) {
		$o=new FloorPlanModel();
		$o->assignByHash(self::domNodeToHash($node, self::$FIELD_NAMES, self::$DEFAULT_VALUES, self::$FIELD_TYPES));
			$o->notifyPristine();
		return $o;
	}

	/**
	 * get all instances of FloorPlanModel from the passed DOMDocument
	 *
	 * @param DOMDocument $doc
	 * @return FloorPlanModel[]
	 */
	public static function fromDOMDocument(DOMDocument $doc) {
		$instances=array();
		foreach ($doc->getElementsByTagName('FloorPlanModel') as $node) {
			$instances[]=self::fromDOMElement($node);
		}
		return $instances;
	}

}
?>