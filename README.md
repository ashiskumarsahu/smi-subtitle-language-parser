# smi-language-parser
Get available languages with in a **smi** subtitle file in json format

**Syntax**
$getSMILanguages = getSubTitlesFromSMI(<smi file path>);

**Example**
$getSMILanguages = getSubTitlesFromSMI("subtitle-4.smi");

**Output Sample**
{
  "1": {
    " name": " English",
    " lang": " en-US ",
    " samitype": " CC "
  },
  "2": {
    " name": " French",
    "  lang": " fr-FR ",
    " samitype": " CC "
  }
}
