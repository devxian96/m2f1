<?php

/* server/variables/variable_row.twig */
class __TwigTemplate_b3c46f8f2212a175b9a4b05ffba1f676e970e4616723374065c1f8f265b844e0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<tr class=\"var-row ";
        echo twig_escape_filter($this->env, ($context["row_class"] ?? null), "html", null, true);
        echo "\" data-filter-row=\"";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, ($context["name"] ?? null)), "html", null, true);
        echo "\">
    <td class=\"var-action\">
    ";
        // line 3
        if (($context["editable"] ?? null)) {
            // line 4
            echo "        <a href=\"#\" data-variable=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" class=\"editLink\">";
            echo PhpMyAdmin\Util::getIcon("b_edit", _gettext("Edit"));
            echo "</a>
    ";
        } else {
            // line 6
            echo "        <span title=\"";
            echo _gettext("This is a read-only variable and can not be edited");
            echo "\" class=\"read_only_var\">
            ";
            // line 7
            echo PhpMyAdmin\Util::getIcon("bd_edit", _gettext("Edit"));
            echo "
        </span>
    ";
        }
        // line 10
        echo "    </td>
    <td class=\"var-name\">
    ";
        // line 12
        if ((($context["doc_link"] ?? null) != null)) {
            // line 13
            echo "        <span title=\"";
            echo twig_escape_filter($this->env, twig_replace_filter(($context["name"] ?? null), ["_" => " "]), "html", null, true);
            echo "\">
            ";
            // line 14
            echo PhpMyAdmin\Util::showMySQLDocu($this->getAttribute(($context["doc_link"] ?? null), 1, [], "array"), false, (($this->getAttribute(($context["doc_link"] ?? null), 2, [], "array") . "_") . $this->getAttribute(($context["doc_link"] ?? null), 0, [], "array")), true);
            echo "
            ";
            // line 15
            echo twig_replace_filter(twig_escape_filter($this->env, ($context["name"] ?? null)), ["_" => "&nbsp;"]);
            echo "
            </a>
        </span>
    ";
        } else {
            // line 19
            echo "        ";
            echo twig_escape_filter($this->env, twig_replace_filter(($context["name"] ?? null), ["_" => " "]), "html", null, true);
            echo "
    ";
        }
        // line 21
        echo "    </td>
    <td class=\"var-value value";
        // line 22
        echo ((($context["is_superuser"] ?? null)) ? (" editable") : (""));
        echo "\">
    ";
        // line 23
        if ((($context["is_html_formatted"] ?? null) == false)) {
            // line 24
            echo "        ";
            echo twig_replace_filter(twig_escape_filter($this->env, ($context["value"] ?? null)), ["," => ",&#8203;"]);
            echo "
    ";
        } else {
            // line 26
            echo "        ";
            echo ($context["value"] ?? null);
            echo "
    ";
        }
        // line 28
        echo "    </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "server/variables/variable_row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 28,  91 => 26,  85 => 24,  83 => 23,  79 => 22,  76 => 21,  70 => 19,  63 => 15,  59 => 14,  54 => 13,  52 => 12,  48 => 10,  42 => 7,  37 => 6,  29 => 4,  27 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "server/variables/variable_row.twig", "/workspace/research/admin/templates/server/variables/variable_row.twig");
    }
}
